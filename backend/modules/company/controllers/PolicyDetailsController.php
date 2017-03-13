<?php

namespace backend\modules\company\controllers;

use Yii;
use common\models\PolicyDetails;
use common\models\PolicyDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PolicyDetailsController implements the CRUD actions for PolicyDetails model.
 */
class PolicyDetailsController extends Controller {

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
         * Lists all PolicyDetails models.
         * @return mixed
         */
        public function actionIndex() {
                $searchModel = new PolicyDetailsSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return $this->render('index', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                ]);
        }

        /**
         * Displays a single PolicyDetails model.
         * @param integer $id
         * @return mixed
         */
        public function actionView($id) {
                return $this->render('view', [
                            'model' => $this->findModel($id),
                ]);
        }

        /**
         * Creates a new PolicyDetails model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        public function actionCreate() {
                $model = new PolicyDetails();

                if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
                        $model->cover_start_date = $this->ChangeFormat($model->cover_start_date);
                        $model->cover_end_date = $this->ChangeFormat($model->cover_end_date);
                        $model->review_date = $this->ChangeFormat($model->review_date);
                        $model->renewal_date = $this->ChangeFormat($model->renewal_date);
                        if ($model->validate() && $model->save()) {
                                return $this->redirect(['view', 'id' => $model->id]);
                        }
                }
                return $this->render('create', [
                            'model' => $model,
                ]);
        }

        /**
         * Updates an existing PolicyDetails model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id
         * @return mixed
         */
        public function actionUpdate($id) {
                $model = $this->findModel($id);

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                } else {
                        return $this->render('update', [
                                    'model' => $model,
                        ]);
                }
        }

        /**
         * Deletes an existing PolicyDetails model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param integer $id
         * @return mixed
         */
        public function actionDelete($id) {
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
        }

        /**
         * Finds the PolicyDetails model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param integer $id
         * @return PolicyDetails the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id) {
                if (($model = PolicyDetails::findOne($id)) !== null) {
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

}
