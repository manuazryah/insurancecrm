<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\AdminUsers;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
        <div class="col-md-12">

                <div class="panel panel-default">
                        <div class="panel-heading">
                                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>

                        </div>
                        <div class="panel-body">
                                <?= Html::a('<i class="fa-th-list"></i><span> Manage Product</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                                <div class="panel-body"><div class="product-view">
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
                                                        'product_name',
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


