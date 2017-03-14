<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

        <div class="row">
                <div class="col-md-12">

                        <div class="panel panel-default">
                                <div class="panel-heading">
                                        <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>

                                </div>
                                <div class="panel-body">
                                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                                        <?= Html::a('<i class="fa-th-list"></i><span> Create Customer</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                                        <?=
                                        GridView::widget([
                                            'dataProvider' => $dataProvider,
                                            'filterModel' => $searchModel,
                                            'columns' => [
                                                    ['class' => 'yii\grid\SerialColumn'],
//                                                'id',
                                                'first_name',
                                                'last_name',
                                                'dob',
                                                    [
                                                    'attribute' => 'gender',
                                                    'value' => function ($model) {
                                                            return $model->gender == 1 ? 'Male' : 'Female';
                                                    },
                                                    'filter' => [1 => 'Male', 0 => 'Female'],
                                                ],
                                                // 'marital_status',
                                                // 'occupation',
                                                // 'annual_income',
                                                // 'address:ntext',
                                                // 'contact_number',
                                                // 'email:email',
                                                // 'existing_sick_benifits',
                                                // 'home_owner',
                                                // 'spouse_name',
                                                // 'spouse_dob',
                                                // 'spouse_occupation',
                                                // 'no_of_children',
                                                // 'status',
                                                // 'CB',
                                                // 'UB',
                                                // 'DOC',
                                                // 'DOU',
                                                ['class' => 'yii\grid\ActionColumn'],
                                            ],
                                        ]);
                                        ?>
                                </div>
                        </div>
                </div>
        </div>
</div>


