<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use common\models\CompanyDetails;
use common\models\Product;
use common\models\PolicyType;
use common\models\Cover;
use common\models\AdminUsers;
use common\models\ApplicationStatus;

/* @var $this yii\web\View */
/* @var $model common\models\PolicyDetails */

$this->title = CompanyDetails::findOne($model->company)->company_name;
$this->params['breadcrumbs'][] = ['label' => 'Policy Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
        <div class="col-md-12">

                <div class="panel panel-default">
                        <div class="panel-heading">
                                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>

                        </div>
                        <div class="panel-body">
                                <?= Html::a('<i class="fa-th-list"></i><span> Manage Policy Details</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                                <div class="panel-body"><div class="policy-details-view">
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
//                                                        'id',
                                                            [
                                                            'attribute' => 'company',
                                                            'value' => call_user_func(function($model) {
                                                                            return CompanyDetails::findOne($model->company)->company_name;
                                                                    }, $model),
                                                        ],
                                                            [
                                                            'attribute' => 'product',
                                                            'value' => call_user_func(function($model) {
                                                                            return Product::findOne($model->product)->product_name;
                                                                    }, $model),
                                                        ],
                                                            [
                                                            'attribute' => 'policy_type',
                                                            'value' => call_user_func(function($model) {
                                                                            return PolicyType::findOne($model->policy_type)->policy_name;
                                                                    }, $model),
                                                        ],
                                                            [
                                                            'attribute' => 'cover',
                                                            'value' => call_user_func(function($model) {
                                                                            return Cover::findOne($model->cover)->cover;
                                                                    }, $model),
                                                        ],
                                                        'policy_number',
                                                        'sum_assured',
                                                        'policy_term',
                                                        'cover_start_date',
                                                        'cover_end_date',
                                                            [
                                                            'attribute' => 'application_status',
                                                            'value' => call_user_func(function($model) {
                                                                            return ApplicationStatus::findOne($model->application_status)->application_status;
                                                                    }, $model),
                                                        ],
                                                            [
                                                            'attribute' => 'underwriting_outcome',
                                                            'value' => call_user_func(function($model) {
                                                                            if ($model->underwriting_outcome == 1) {
                                                                                    return 'Accepted on standard Terms';
                                                                            } elseif ($model->underwriting_outcome == 2) {
                                                                                    return 'Accepted with Ratings';
                                                                            } elseif ($model->underwriting_outcome == 3) {
                                                                                    return 'Accepted with Ratings';
                                                                            }
                                                                    }, $model),
                                                        ],
                                                            [
                                                            'label' => 'Policy Status',
                                                            'format' => 'raw',
                                                            'value' => $model->policy_status == 1 ? 'Live' : 'Canceled',
                                                        ],
                                                        'reason:ntext',
                                                        'review_date',
                                                        'renewal_date',
                                                        'commision',
                                                            [
                                                            'label' => 'Status',
                                                            'format' => 'raw',
                                                            'value' => $model->status == 1 ? 'Enabled' : 'disabled',
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


