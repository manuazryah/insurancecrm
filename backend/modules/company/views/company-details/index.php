<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CompanyDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Company Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-details-index">

        <div class="row">
                <div class="col-md-12">

                        <div class="panel panel-default">
                                <div class="panel-heading">
                                        <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>

                                </div>
                                <div class="panel-body">
                                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                                        <?= Html::a('<i class="fa-th-list"></i><span> Create Company Details</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                                        <?=
                                        GridView::widget([
                                            'dataProvider' => $dataProvider,
                                            'filterModel' => $searchModel,
                                            'columns' => [
                                                    ['class' => 'yii\grid\SerialColumn'],
//                                                            'id',
                                                [
                                                    'attribute' => 'company_logo',
                                                    'format' => 'raw',
                                                    'value' => function ($data) {

                                                            $img = '<img width="75px;height:75px" src="' . Yii::$app->homeUrl . '../uploads/companyImages/' . $data->id . '.' . $data->company_logo . '"/>';

                                                            return $img;
                                                    },
                                                ],
                                                'company_name',
                                                'contact_person',
                                                'position',
                                                'phone',
                                                // 'email:email',
                                                // 'website_link',
                                                // 'agency_details:ntext',
                                                // 'remarks:ntext',
                                                // 'user_name',
                                                // 'password',
                                                // 'status',
                                                // 'CB',
                                                // 'UB',
                                                // 'DOC',
                                                // 'DOU',
//                            ['class' => 'yii\grid\ActionColumn'],
                                                [
                                                    'class' => 'yii\grid\ActionColumn',
                                                    'contentOptions' => [],
                                                    'header' => 'Actions',
                                                    'template' => '{view}{update}{delete}{company_contatcs}',
                                                    'buttons' => [
                                                        //view button
                                                        'view' => function ($url, $model) {
                                                                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                                                            'title' => Yii::t('app', 'view'),
                                                                            'class' => '',
                                                                ]);
                                                        },
                                                        'update' => function ($url, $model) {
                                                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                                            'title' => Yii::t('app', 'update'),
                                                                            'class' => '',
                                                                ]);
                                                        },
                                                        'delete' => function ($url, $model) {
                                                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                                                            'title' => Yii::t('app', 'delete'),
                                                                            'class' => '',
                                                                            'data' => [
                                                                                'confirm' => 'Are you absolutely sure ?',
                                                                            ],
                                                                ]);
                                                        },
                                                        'company_contatcs' => function ($url, $model) {
                                                                return Html::a('<i class="fa fa-phone-square" aria-hidden="true"></i>', ['company-contacts/add', 'id' => $model->id], [
                                                                            'title' => Yii::t('app', 'company contacts'),
                                                                            'class' => 'actions',
                                                                ]);
                                                        },
                                                    ],
                                                    'urlCreator' => function ($action, $model) {

                                                            if ($action === 'view') {
                                                                    $url = 'view?id=' . $model->id;
                                                                    return $url;
                                                            }
                                                            if ($action === 'update') {
                                                                    $url = 'update?id=' . $model->id;
                                                                    return $url;
                                                            }
                                                            if ($action === 'delete') {
                                                                    $url = 'delete?id=' . $model->id;
                                                                    return $url;
                                                            }
                                                    }
                                                ],
                                            ],
                                        ]);
                                        ?>
                                </div>
                        </div>
                </div>
        </div>
</div>


