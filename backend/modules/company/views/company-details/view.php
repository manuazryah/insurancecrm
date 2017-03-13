<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\AdminUsers;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyDetails */

$this->title = $model->company_name;
$this->params['breadcrumbs'][] = ['label' => 'Company Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
        <div class="col-md-12">

                <div class="panel panel-default">
                        <div class="panel-heading">
                                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>

                        </div>
                        <div class="panel-body">
                                <?= Html::a('<i class="fa-th-list"></i><span> Manage Company Details</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                                <div class="panel-body"><div class="company-details-view">
                                                <p>
                                                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                                        <?=
                                                        Html::a('Delete', ['delete', 'id' => $model->id], [
                                                            'class' => 'btn btn-danger',
                                                            'data' => [
                                                                'confirm' => 'Are you sure you want to delete this item?',
                                                                'method' => 'post',
                                                            ],
                                                        ])
                                                        ?>
                                                </p>

                                                <?=
                                                DetailView::widget([
                                                    'model' => $model,
                                                    'attributes' => [
//                                                            'id',
                                                        'company_name',
                                                            [
                                                            'attribute' => 'company_logo',
                                                            'format' => 'raw',
                                                            'value' => call_user_func(function($model) {
                                                                            return '<img width="120px" height="120px" src="' . Yii::$app->homeUrl . '../uploads/companyImages/' . $model->id . '.' . $model->company_logo . '"/>';
                                                                    }, $model),
                                                        ],
                                                        'company_logo',
                                                        'contact_person',
                                                        'position',
                                                        'phone',
                                                        'email:email',
                                                        'website_link',
                                                        'agency_details:ntext',
                                                        'remarks:ntext',
                                                        'user_name',
                                                        'password',
                                                            [
                                                            'attribute' => 'status',
                                                            'value' => $model->status == 1 ? 'Enabled' : 'Disabled',
                                                        ],
                                                            [
                                                            'attribute' => 'CB',
                                                            'label' => 'Created By',
                                                            'value' => call_user_func(function($model) {

                                                                            return AdminUsers::findOne($model->CB)->name;
                                                                    }, $model),
                                                        ],
                                                            [
                                                            'attribute' => 'UB',
                                                            'label' => 'Updated By',
                                                            'value' => call_user_func(function($model) {

                                                                            return AdminUsers::findOne($model->UB)->name;
                                                                    }, $model),
                                                        ],
                                                        'DOC',
                                                        'DOU',
                                                    ],
                                                ])
                                                ?>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>


