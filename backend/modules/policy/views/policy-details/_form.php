<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Product;
use common\models\PolicyType;
use common\models\Cover;
use common\models\ApplicationStatus;
use common\models\CompanyDetails;

/* @var $this yii\web\View */
/* @var $model common\models\PolicyDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="policy-details-form form-inline">

        <?php $form = ActiveForm::begin(); ?>

        <?php
        $company = ArrayHelper::map(CompanyDetails::find()->where(['status' => 1])->all(), 'id', 'company_name');
        $product = ArrayHelper::map(Product::find()->where(['status' => 1])->all(), 'id', 'product_name');
        $policy_type = ArrayHelper::map(PolicyType::find()->where(['status' => 1])->all(), 'id', 'policy_name');
        $cover = ArrayHelper::map(Cover::find()->where(['status' => 1])->all(), 'id', 'cover');
        $application_status = ArrayHelper::map(ApplicationStatus::find()->where(['status' => 1])->all(), 'id', 'application_status');
        ?>

        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'company')->dropDownList($company, ['prompt' => '-Choose Company-']) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'product')->dropDownList($product, ['prompt' => '-Choose Product-']) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'policy_type')->dropDownList($policy_type, ['prompt' => '-Choose Policy Type-']) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'cover')->dropDownList($cover, ['prompt' => '-Choose Cover-']) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'policy_number')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'sum_assured')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'policy_term')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?=
                $form->field($model, 'cover_start_date')->widget(\yii\jui\DatePicker::classname(), [
                    //'language' => 'ru',
                    'dateFormat' => 'dd-MM-yyyy',
                    'options' => ['class' => 'form-control'],
                ])
                ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?=
                $form->field($model, 'cover_end_date')->widget(\yii\jui\DatePicker::classname(), [
                    //'language' => 'ru',
                    'dateFormat' => 'dd-MM-yyyy',
                    'options' => ['class' => 'form-control']
                ])
                ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'application_status')->dropDownList($application_status, ['prompt' => '-Choose Application Status      -']) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'underwriting_outcome')->dropDownList(['1' => 'Accepted on standard Terms', '2' => 'Accepted with Ratings', '3' => 'Accepted with Exclusions']) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'policy_status')->dropDownList(['1' => 'live', '0' => 'Canceled']) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'reason')->textarea(['rows' => 6]) ?>

        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?=
                $form->field($model, 'review_date')->widget(\yii\jui\DatePicker::classname(), [
                    //'language' => 'ru',
                    'dateFormat' => 'dd-MM-yyyy',
                    'options' => ['class' => 'form-control']
                ])
                ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?=
                $form->field($model, 'renewal_date')->widget(\yii\jui\DatePicker::classname(), [
                    //'language' => 'ru',
                    'dateFormat' => 'dd-MM-yyyy',
                    'options' => ['class' => 'form-control']
                ])
                ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'commision')->textInput() ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'status')->dropDownList(['1' => 'Enabled', '0' => 'Disabled']) ?>
        </div>
        <div class="form-group" style="float: right;">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'margin-top: 18px; height: 36px; width:100px;']) ?>
        </div>

        <?php ActiveForm::end(); ?>

</div>
