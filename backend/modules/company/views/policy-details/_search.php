<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PolicyDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="policy-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'company') ?>

    <?= $form->field($model, 'product') ?>

    <?= $form->field($model, 'policy_type') ?>

    <?= $form->field($model, 'cover') ?>

    <?php // echo $form->field($model, 'policy_number') ?>

    <?php // echo $form->field($model, 'sum_assured') ?>

    <?php // echo $form->field($model, 'policy_term') ?>

    <?php // echo $form->field($model, 'cover_start_date') ?>

    <?php // echo $form->field($model, 'cover_end_date') ?>

    <?php // echo $form->field($model, 'application_status') ?>

    <?php // echo $form->field($model, 'underwriting_outcome') ?>

    <?php // echo $form->field($model, 'policy_status') ?>

    <?php // echo $form->field($model, 'reason') ?>

    <?php // echo $form->field($model, 'review_date') ?>

    <?php // echo $form->field($model, 'renewal_date') ?>

    <?php // echo $form->field($model, 'commision') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'CB') ?>

    <?php // echo $form->field($model, 'UB') ?>

    <?php // echo $form->field($model, 'DOC') ?>

    <?php // echo $form->field($model, 'DOU') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
