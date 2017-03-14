<?php

namespace backend\modules\user\controllers;

use Yii;
use common\models\Customer;
use common\models\CustomerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Children;

/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends Controller {

        public function init() {
                if (Yii::$app->user->isGuest)
                        $this->redirect(['/site/index']);

                if (Yii::$app->session['post']['admin'] != 1)
                        $this->redirect(['/site/home']);
        }

        /**
         * @inheritdoc
         */
        public function behaviors() {
                return [
                    'verbs' => [
                        'class' => VerbFilter::className(),
                        'actions' => [
                            'delete' => ['POST'],
                        ],
                    ],
                ];
        }

        /**
         * Lists all Customer models.
         * @return mixed
         */
        public function actionIndex() {
                $searchModel = new CustomerSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return $this->render('index', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                ]);
        }

        /**
         * Displays a single Customer model.
         * @param integer $id
         * @return mixed
         */
        public function actionView($id) {
                $model_children = Children::find()->where(['customer_id' => $id])->one();
                return $this->render('view', [
                            'model' => $this->findModel($id),
                            'model_children' => $model_children,
                ]);
        }

        /**
         * Creates a new Customer model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        public function actionCreate() {
                $model = new Customer();
                $model_children = new Children();
                if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
                        $model->dob = $this->ChangeFormat($model->dob);
                        $model->spouse_dob = $this->ChangeFormat($model->spouse_dob);
                        if ($model->save()) {
                                $this->SaveUserData($model);
//                                $this->sendMail($model);
                                return $this->redirect(['view', 'id' => $model->id]);
                        }
                }
                return $this->render('create', [
                            'model' => $model,
                            'model_children' => $model_children,
                ]);
        }

        public function SaveUserData($model) {
                /*
                 * for creating childrens data
                 */
                if (isset($_POST['create']) && $_POST['create'] != '') {
                        $arr = [];
                        $i = 0;

                        foreach ($_POST['create']['clildren_name'] as $val) {
                                $arr[$i]['clildren_name'] = $val;
                                $i++;
                        }
                        $i = 0;
                        foreach ($_POST['create']['clildren_gender'] as $val) {
                                $arr[$i]['clildren_gender'] = $val;
                                $i++;
                        }
                        $i = 0;
                        foreach ($_POST['create']['clildren_dob'] as $val) {
                                $arr[$i]['clildren_dob'] = $val;
                                $i++;
                        }
                        foreach ($arr as $val) {
                                $children = new Children();
                                $children->customer_id = $model->id;
                                $children->name = $val['clildren_name'];
                                $children->gender = $val['clildren_gender'];
                                $children->dob = $val['clildren_dob'];
                                $children->status = 1;
                                $children->CB = Yii::$app->user->identity->id;
                                $children->UB = Yii::$app->user->identity->id;
                                $children->DOC = date('Y-m-d');
                                if (!empty($children->name))
                                        $children->save();
                        }
                }

                /*
                 * for updating childrens data
                 */
                if (isset($_POST['updatee']) && $_POST['updatee'] != '') {
                        $arr = [];
                        $i = 0;
                        foreach ($_POST['updatee'] as $key => $val) {
                                $arr[$key]['clildren_name'] = $val['clildren_name'][0];
                                $arr[$key]['clildren_gender'] = $val['clildren_gender'][0];
                                $arr[$key]['clildren_dob'] = $val['clildren_dob'][0];
                                $i++;
                        }
                        foreach ($arr as $key => $value) {
                                $children = Children::findOne($key);
                                $children->name = $value['clildren_name'];
                                $children->gender = $value['clildren_gender'];
                                $children->dob = $value['clildren_dob'];
                                if ($children->name != '') {
                                        $children->save();
                                }
                        }
                }
                return true;
        }

        /**
         * Updates an existing Customer model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id
         * @return mixed
         */
        public function actionUpdate($id) {
                $model = $this->findModel($id);
                $model_children = Children::findAll(['customer_id' => $id]);
                if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
                        $model->dob = $this->ChangeFormat($model->dob);
                        $model->spouse_dob = $this->ChangeFormat($model->spouse_dob);
                        if ($model->save()) {
                                $this->SaveUserData($model);
                                return $this->redirect(['view', 'id' => $model->id]);
                        }
                }
                return $this->render('update', [
                            'model' => $model,
                            'model_children' => $model_children,
                ]);
        }

        /**
         * Deletes an existing Customer model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param integer $id
         * @return mixed
         */
        public function actionDelete($id) {
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
        }

        /**
         * Finds the Customer model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param integer $id
         * @return Customer the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id) {
                if (($model = Customer::findOne($id)) !== null) {
                        return $model;
                } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                }
        }

        /*
         * To change the date formate
         * return new date
         */

        public function ChangeFormat($data) {
                if ($data != '') {
                        $originalDate = $data;
                        $newDate = date("Y-m-d", strtotime($originalDate));
                        return $newDate;
                } else {
                        return '';
                }
        }

        public function sendMail($model) {

                $to = 'manu@azryah.com';

// subject
                $subject = 'Change password';

// message
                echo
                $message = 'Your Registration has successfully completed';
                exit;
// To send HTML mail, the Content-type header must be set
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n" .
                        "From: 'noreplay@azryah.com";
                mail($to, $subject, $message, $headers);
        }

}
