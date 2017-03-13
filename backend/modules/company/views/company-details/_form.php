<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-details-form form-inline">

        <?php $form = ActiveForm::begin(); ?>

        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

        </div>

        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'contact_person')->textInput(['maxlength' => true]) ?>

        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'phone')->textInput() ?>

        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'website_link')->textInput(['maxlength' => true]) ?>

        </div>

        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

        </div>
        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

        </div>


        <div class='col-md-6 col-sm-12 col-xs-12'>
                <?= $form->field($model, 'agency_details')->textarea(['rows' => 6]) ?>

        </div>
        <div class='col-md-6 col-sm-12 col-xs-12'>
                <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

        </div>

        <div class='col-md-4 col-sm-6 col-xs-12'>
                <?= $form->field($model, 'company_logo')->fileInput() ?>

        </div>
        <?php
        if ($model->isNewRecord)
                echo "";
        else {
                ?>
                <div class='col-md-4 col-sm-6 col-xs-12'>
                        <img src="<?= Yii::$app->homeUrl ?>../uploads/companyImages/<?= $model->id ?>.<?= $model->company_logo; ?>" width="75" height="75"/>
                </div>
                <?php
        }
        ?>
        <div class='col-md-4 col-sm-6 col-xs-12' style="float: right;">

                <div class="form-group" style="float: right;">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'margin-top: 18px; height: 36px; width:100px;']) ?>
                </div>

        </div>


        <?php ActiveForm::end(); ?>

</div>
