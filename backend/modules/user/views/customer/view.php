<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\AdminUsers;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */

$this->title = $model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
        <div class="col-md-12">

                <div class="panel panel-default">
                        <div class="panel-heading">
                                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>

                        </div>
                        <div class="panel-body">
                                <?= Html::a('<i class="fa-th-list"></i><span> Manage Customer</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                                <div class="panel-body"><div class="customer-view">
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
                                                        'first_name',
                                                        'last_name',
                                                        'dob',
                                                            [
                                                            'label' => 'Gender',
                                                            'format' => 'raw',
                                                            'value' => $model->gender == 1 ? 'Male' : 'Female',
                                                        ],
                                                            [
                                                            'attribute' => 'marital_status',
                                                            'value' => call_user_func(function($model) {
                                                                            if ($model->marital_status == 1) {
                                                                                    return 'Single';
                                                                            } elseif ($model->marital_status == 2) {
                                                                                    return 'Married';
                                                                            } elseif ($model->marital_status == 3) {
                                                                                    return 'Divorced';
                                                                            } elseif ($model->marital_status == 4) {
                                                                                    return 'Widowed';
                                                                            }
                                                                    }, $model),
                                                        ],
                                                        'occupation',
                                                        'annual_income',
                                                        'address:ntext',
                                                        'contact_number',
                                                        'email:email',
                                                        'existing_sick_benifits',
                                                            [
                                                            'label' => 'Existing Sick Benifits',
                                                            'format' => 'raw',
                                                            'value' => $model->existing_sick_benifits == 1 ? 'Yes' : 'No',
                                                        ],
                                                            [
                                                            'label' => 'Home Owner',
                                                            'format' => 'raw',
                                                            'value' => $model->home_owner == 1 ? 'Yes' : 'No',
                                                        ],
                                                        'spouse_name',
                                                        'spouse_dob',
                                                        'spouse_occupation',
                                                        'no_of_children',
                                                            [
                                                            'attribute' => 'status',
                                                            'value' => call_user_func(function($model) {
                                                                            if ($model->status == 1) {
                                                                                    return 'ENABLED';
                                                                            } else {
                                                                                    return 'DISABLED';
                                                                            }
                                                                    }, $model),
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


