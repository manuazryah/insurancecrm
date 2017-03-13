<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\CompanyDetails;
use common\models\Product;
use common\models\PolicyType;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PolicyDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Policy Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="policy-details-index">

        <div class="row">
                <div class="col-md-12">

                        <div class="panel panel-default">
                                <div class="panel-heading">
                                        <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>

                                </div>
                                <div class="panel-body">
                                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                                        <?= Html::a('<i class="fa-th-list"></i><span> Create Policy Details</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                                        <?=
                                        GridView::widget([
                                            'dataProvider' => $dataProvider,
                                            'filterModel' => $searchModel,
                                            'columns' => [
                                                    ['class' => 'yii\grid\SerialColumn'],
//                                                'id',
                                                [
                                                    'attribute' => 'company',
                                                    'value' => function($data) {

                                                            return CompanyDetails::findOne($data->company)->company_name;
                                                    },
                                                    'filter' => ArrayHelper::map(CompanyDetails::find()->asArray()->all(), 'id', 'company_name'),
                                                ],
                                                    [
                                                    'attribute' => 'product',
                                                    'value' => function($data) {

                                                            return Product::findOne($data->product)->product_name;
                                                    },
                                                    'filter' => ArrayHelper::map(Product::find()->asArray()->all(), 'id', 'product_name'),
                                                ],
                                                    [
                                                    'attribute' => 'policy_type',
                                                    'value' => function($data) {

                                                            return PolicyType::findOne($data->policy_type)->policy_name;
                                                    },
                                                    'filter' => ArrayHelper::map(PolicyType::find()->asArray()->all(), 'id', 'policy_name'),
                                                ],
                                                'policy_number',
                                                // 'sum_assured',
                                                // 'policy_term',
                                                // 'cover_start_date',
                                                // 'cover_end_date',
                                                // 'application_status',
                                                // 'underwriting_outcome',
                                                // 'policy_status',
                                                // 'reason:ntext',
                                                // 'review_date',
                                                // 'renewal_date',
                                                // 'commision',
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


