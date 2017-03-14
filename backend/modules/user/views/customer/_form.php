<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form form-inline">

        <?php $form = ActiveForm::begin(); ?>
        <?php
        if ($model->isNewRecord) {
                $model->dob = date('d-m-Y');
        }
        ?>
        <div class="row">
                <div class='col-md-2 col-sm-6 col-xs-12'>
                        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

                </div>
                <div class='col-md-2 col-sm-6 col-xs-12'>
                        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

                </div>
                <div class='col-md-4 col-sm-6 col-xs-12'>
                        <?=
                        $form->field($model, 'dob')->widget(\yii\jui\DatePicker::classname(), [
                            //'language' => 'ru',
                            'dateFormat' => 'dd-MM-yyyy',
                            'options' => ['class' => 'form-control'],
                        ])
                        ?>
                </div>
                <div class='col-md-4 col-sm-6 col-xs-12'>
                        <?= $form->field($model, 'gender')->dropDownList(['1' => 'Male', '0' => 'Female']) ?>
                </div>
                <div class='col-md-4 col-sm-6 col-xs-12'>
                        <?= $form->field($model, 'marital_status')->dropDownList(['1' => 'Single', '2' => 'Married', '3' => 'Divorced', '4' => 'Widowed']) ?>

                </div>
                <div class='col-md-4 col-sm-6 col-xs-12'>
                        <?= $form->field($model, 'occupation')->textInput(['maxlength' => true]) ?>

                </div>
                <div class='col-md-4 col-sm-6 col-xs-12'>
                        <?= $form->field($model, 'annual_income')->textInput() ?>

                </div>
                <div class='col-md-4 col-sm-6 col-xs-12'>
                        <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

                </div>

                <div class='col-md-4 col-sm-6 col-xs-12'>
                        <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true]) ?>

                </div>
                <div class='col-md-4 col-sm-6 col-xs-12'>
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                </div>
                <div class='col-md-4 col-sm-6 col-xs-12'>
                        <?= $form->field($model, 'existing_sick_benifits')->dropDownList(['1' => 'Yes', '0' => 'No']) ?>
                </div>
                <div class='col-md-4 col-sm-6 col-xs-12'>
                        <?= $form->field($model, 'home_owner')->dropDownList(['1' => 'Yes', '0' => 'No']) ?>
                </div>
                <div class='col-md-4 col-sm-6 col-xs-12'>
                        <?= $form->field($model, 'spouse_name')->textInput(['maxlength' => true]) ?>

                </div>
                <div class='col-md-4 col-sm-6 col-xs-12'>
                        <?=
                        $form->field($model, 'spouse_dob')->widget(\yii\jui\DatePicker::classname(), [
                            //'language' => 'ru',
                            'dateFormat' => 'dd-MM-yyyy',
                            'options' => ['class' => 'form-control'],
                        ])
                        ?>
                </div>
                <div class='col-md-4 col-sm-6 col-xs-12'>
                        <?= $form->field($model, 'spouse_occupation')->textInput(['maxlength' => true]) ?>

                </div>
                <div class='col-md-4 col-sm-6 col-xs-12'>
                        <?= $form->field($model, 'no_of_children')->textInput() ?>

                </div>
                <div class='col-md-4 col-sm-6 col-xs-12'>
                        <?= $form->field($model, 'status')->dropDownList(['1' => 'Enabled', '0' => 'Disabled']) ?>

                </div>
        </div>
        <div class="row">
                <h3 style="color: #b60d14;">Childrens Details</h3>
                <hr style="border: 1px solid rgba(39, 41, 42, 0.46);"/>
        </div>

        <div id="p_scents">
                <span>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                        <label class="control-label">Name</label>
                                </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group ">
                                        <label class="control-label" for="">Gender</label>
                                </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                        <label class="control-label" >Date of Birth</label>
                                </div>
                        </div>
                </span>
                <?php
                if (!$model_children->isNewRecord) {
                        ?>
                        <input type="hidden" value="<?php echo count($model_children); ?>" id="child-count"/>

                        <?php
                        foreach ($model_children as $data) {
                                ?>
                                <span>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                        <input type="text" class="form-control" name="updatee[<?= $data->id; ?>][clildren_name][]" value="<?= $data->name; ?>" required>
                                                </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="form-group ">
                                                        <select name="updatee[<?= $data->id; ?>][clildren_gender][]" class="form-control">
                                                                <option value="1" <?php if ($data->gender == 1) { ?> selected <?php } ?> >Male</option>
                                                                <option value="0" <?php if ($data->gender == 0) { ?> selected <?php } ?> >Female</option>
                                                        </select>
                                                </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                        <input type="date" class="form-control" name="updatee[<?= $data->id; ?>][clildren_dob][]" value="<?= $data->dob; ?>">
                                                </div>
                                        </div>
                                </span>
                                <?php
                        }
                } else {
                        ?>
                        <input type="hidden" value="0" id="child-count"/>
                <?php }
                ?>
                <br>
                <br/>
        </div>

        <div class="form-group" style="float: right;">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'margin-top: 18px; height: 36px; width:100px;']) ?>
        </div>

        <?php ActiveForm::end(); ?>

</div>

<script>
        $(document).ready(function () {
                $(".span-create").hide();
                /*
                 * Add more bnutton function
                 */
                var scntDiv = $('#p_scents');
//                var i = $('#p_scents span').size() + 1;
                $('#customer-no_of_children').on('blur', function () {
                        var childcount = $('#child-count').val();
                        var val = parseInt(this.value, 10);
                        var count = val - childcount;
                        for (var i = 1; i <= count; i++) {
                                var ver = '<span>\n\
        <div class="col-md-4 col-sm-6 col-xs-12">\n\
        <div class="form-group">\n\
        <input type="text" class="form-control" name="create[clildren_name][]">\n\
        </div>\n\
                </div>\n\
                <div class="col-md-4 col-sm-6 col-xs-12">\n\
        <div class="form-group ">\n\
                <select name="create[clildren_gender][]" class="form-control">\n\
        <option value="1">Male</option>\n\
        <option value="0">Female</option>\n\
                </select>\n\
                </div>\n\
                </div>\n\
                <div class="col-md-4 col-sm-6 col-xs-12">\n\
        <div class="form-group">\n\
                <input type="date" class="form-control" name="create[clildren_dob][]">\n\
        </div>\n\
                </div>\n\
                </span>';

                                $(ver).appendTo(scntDiv);
                        }
                        $("#child-count").val(val);
                        $(".span-create").show();
                        return false;

                });

        });
</script>
