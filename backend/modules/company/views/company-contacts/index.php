<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\CompanyDetails;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CompanyContactsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Company Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-contacts-index">

        <div class="row">
                <div class="col-md-12">

                        <div class="panel panel-default">
                                <div class="panel-heading">
                                        <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>

                                </div>
                                <div class="panel-body">
                                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                                        <?= Html::a('<i class="fa-th-list"></i><span> Create Company Contacts</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                                        <?=
                                        GridView::widget([
                                            'dataProvider' => $dataProvider,
                                            'filterModel' => $searchModel,
                                            'columns' => [
                                                    ['class' => 'yii\grid\SerialColumn'],
//                                                            'id',
                                                [
                                                    'attribute' => 'company_id',
                                                    'label' => 'Company',
                                                    'value' => function($data) {

                                                            return CompanyDetails::findOne($data->company_id)->company_name;
                                                    },
                                                    'filter' => ArrayHelper::map(CompanyDetails::find()->asArray()->all(), 'id', 'company_name'),
                                                ],
                                                'name',
                                                'email:email',
                                                'telephone',
                                                'position',
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


