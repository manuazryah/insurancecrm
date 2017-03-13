<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\db\Expression;
use common\components\AppointmentWidget;

/* @var $this yii\web\View */
/* @var $model common\models\EstimatedProforma */

$this->title = 'Create Company Contacts';
$this->params['breadcrumbs'][] = ['label' => 'Company Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$token = Yii::$app->request->get('token');
?>
<style>
    .appoint{
        width: 100%;
        background-color: #f5f5f5;
    }
    .appoint .value{
        font-weight: bold;
        text-align: left;
    }
    .appoint .labell{
        text-align: right;
    }
    .appoint .colen{

    }
    .appoint td{
        padding: 10px;
    }
</style>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h2  class="appoint-title panel-title"><?= Html::encode($this->title) . ' <b style="color: #008cbd;">' . '</b>' ?></h2>

            </div>
            <?php //Pjax::begin();  ?>
            <div class="panel-body">
                <table class="appoint">
                    <tr>
                        <td class="labell">COMPANY NAME </td><td class="colen">:</td><td class="value"><?= $company_details->company_name; ?> </td>
                        <td class="labell">CONTACT PERSON </td><td class="colen">:</td><td class="value"><?= $company_details->contact_person; ?> </td>
                        <td class="labell">POSITION </td><td class="colen">:</td><td class="value"><?= $company_details->position; ?> </td>
                    </tr>
                    <tr>
                        <td class="labell">WEBSITE LINK </td><td class="colen">:</td><td class="value"><?= $company_details->website_link; ?> </td>
                        <td class="labell">EMAIL </td><td class="colen">:</td><td class="value"><?= $company_details->email; ?> </td>
                        <td class="labell">PHONE </td><td class="colen">:</td><td class="value"><?= $company_details->phone; ?> </td>
                    </tr>

                </table>
                <?php // AppointmentWidget::widget(['id' => $appointment->id]) ?>


                <hr class="appoint_history" />


                <div class="outterr">
                    <div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">

                        <table cellspacing="0" class="table table-small-font table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th data-priority="1">#</th>
                                    <th data-priority="3">NAME</th>
                                    <th data-priority="1">EMAIL</th>
                                    <th data-priority="3">TELEPHONE</th>
                                    <th data-priority="6">POSITION</th>
                                    <th data-priority="1">ACTIONS</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($company_contacts as $company_contact):
                                    $i++;
                                    ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $company_contact->name; ?></td>
                                        <td><?= $company_contact->email; ?></td>
                                        <td><?= $company_contact->telephone; ?></td>
                                        <td><?= $company_contact->position; ?></td>
                                        <td>
                                            <?= Html::a('<i class="fa fa-pencil"></i>', ['/company/company-contacts/add', 'id' => $id, 'prfrma_id' => $company_contact->id], ['class' => '']) ?>
                                            <?= Html::a('<i class="fa-remove"></i>', ['/company/company-contacts/delete', 'id' => $company_contact->id], ['class' => '', 'data-confirm' => 'Are you sure you want to delete this item?']) ?>
                                            <?php // Html::a('<i class="fa fa-database"></i>', ['/appointment/close-estimate-sub-service/add', 'id' => $estimate->id], ['class' => '', 'target' => '_blank']) ?>
                                            <?php // Html::a('<i class="fa-print"></i>', ['close-estimate/fda-report'], ['class' => '', 'onclick' => "window.open('fda-report?id=$estimate->apponitment_id & estid=$estimate->id', 'newwindow', 'width=1200, height=500');return false;"]) ?>
                                        </td>
                                    </tr>

                                    <?php
                                endforeach;
                                ?>
                                <tr class="formm">
                                    <?php $form = ActiveForm::begin(); ?>
                                    <td></td>
                                    <td><?= $form->field($model, 'name')->textInput(['placeholder' => 'Name'])->label(false) ?></td>
                                    <td><?= $form->field($model, 'email')->textInput(['placeholder' => 'Email'])->label(false) ?></td>
                                    <td><?= $form->field($model, 'telephone')->textInput(['placeholder' => 'Telephone'])->label(false) ?></td>
                                    <td><?= $form->field($model, 'position')->textInput(['placeholder' => 'Position'])->label(false) ?></td>
                                    <td><?= Html::submitButton($model->isNewRecord ? 'Add' : 'Update', ['class' => 'btn btn-success']) ?>
                                    </td>
                                    <?php ActiveForm::end(); ?>
                                </tr>
                                <tr></tr>

                                <!-- Repeat -->

                            </tbody>

                        </table>
                        <br/>

                    </div>
                    <script>
                        $("document").ready(function () {
                            $('#closeestimate-service_id').change(function () {
                                var service_id = $(this).val();
                                $.ajax({
                                    type: 'POST',
                                    cache: false,
                                    data: {service_id: service_id},
                                    url: '<?= Yii::$app->homeUrl; ?>/appointment/close-estimate/supplier',
                                    success: function (data) {
                                        if (data == 1) {
                                            $("#closeestimate-supplier").prop('disabled', false);
                                        } else {
                                            $("#closeestimate-supplier").prop('disabled', true);
                                        }
                                    }
                                });
                            });

                        });
                    </script>
                    <script type="text/javascript">
                        jQuery(document).ready(function ($)
                        {
                            $("#closeestimate-service_id").select2({
                                //placeholder: 'Select your country...',
                                allowClear: true
                            }).on('select2-open', function ()
                            {
                                // Adding Custom Scrollbar
                                $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                            });



                            $("#closeestimate-supplier").select2({
                                //placeholder: 'Select your country...',
                                allowClear: true
                            }).on('select2-open', function ()
                            {
                                // Adding Custom Scrollbar
                                $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                            });

                            $("#estimatedproforma-currency").select2({
                                //placeholder: 'Select your country...',
                                allowClear: true
                            }).on('select2-open', function ()
                            {
                                // Adding Custom Scrollbar
                                $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                            });


                            $("#closeestimate-principal").select2({
                                //placeholder: 'Select your country...',
                                allowClear: true
                            }).on('select2-open', function ()
                            {
                                // Adding Custom Scrollbar
                                $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                            });



                        });
                    </script>

                    <script>
                        $(document).ready(function () {
                            $("#closeestimate-unit_rate").keyup(function () {
                                multiply();
                            });
                            $("#closeestimate-unit").keyup(function () {
                                multiply();
                            });
                        });
                        function multiply() {
                            var rate = $("#closeestimate-unit_rate").val();
                            var unit = $("#closeestimate-unit").val();
                            if (rate != '' && unit != '') {
                                $("#closeestimate-fda").val(rate * unit);
                            }

                        }
                        $("#closeestimate-fda").prop("disabled", true);
                    </script>


                    <link rel="stylesheet" href="<?= Yii::$app->homeUrl; ?>/js/select2/select2.css">
                    <link rel="stylesheet" href="<?= Yii::$app->homeUrl; ?>/js/select2/select2-bootstrap.css">
                    <script src="<?= Yii::$app->homeUrl; ?>/js/select2/select2.min.js"></script>


                </div>
                <?php //Pjax::end();                       ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="add-sub">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Dynamic Content</h4>
            </div>

            <div class="modal-body">

                Content is loading...

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info">Save changes</button>
            </div>
        </div>
    </div>
    <style>
        .filter{
            background-color: #b9c7a7;
        }
        table.table tr td:last-child a {
            padding: 0px 4px;
        }
        /*                .principp{
                                display:none;
                        }*/
        .display-uploads{
            margin-bottom: 25px;
            text-align: center;
            margin-left: 175px;
            margin-right: 100px;
        }
        /*        .edit-input {
                    display:none;
                }*/
    </style>
    <script>
                        $("document").ready(function () {
                            $('#close-estimate-invoice').change(function () {
                                var invoice = $(this).val();
                                if (invoice == 'all') {
                                    $('.principp').show();
                                } else {
                                    $('.principp').hide();
                                }
                            });
                        });
    </script>
    <script>
        $("document").ready(function () {


            /*
             * Double click enter function
             * */

            $('.edit_text').on('dblclick', function () {
                var val = $(this).attr('val');
                var idd = this.id;
                var res_data = idd.split("-");
                if (res_data[1] == 'comments' || res_data[1] == 'comment_to_fda') {
                    $(this).html('<textarea class="' + idd + '" value="' + val + '">' + val + '</textarea>');

                } else {
                    $(this).html('<input class="' + idd + '" type="text" value="' + val + '"/>');

                }

                $('.' + idd).focus();
            });
            $('.edit_text').on('focusout', 'input,textarea', function () {
                var thiss = $(this).parent('.edit_text');
                var data_id = thiss.attr('id');
                var update = thiss.attr('update');
                var res_id = data_id.split("-");
                var res_val = $(this).val();
                $.ajax({
                    type: 'POST',
                    cache: false,
                    data: {id: res_id[0], name: res_id[1], valuee: res_val},
                    url: '<?= Yii::$app->homeUrl; ?>/appointment/close-estimate/edit-estimate',
                    success: function (data) {
                        if (data == '') {
                            data = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        }
                        thiss.html(res_val);
                    }
                });

            });

            /*
             * Double click Dropdown
             * */

            $('.edit_dropdown').on('dblclick', function () {
                var val = $(this).attr('val');
                var drop_id = $(this).attr('drop_id');
                var idd = this.id;
                var option = $('#' + drop_id).html();
                $(this).html('<select class="' + drop_id + '" value="' + val + '">' + option + '</select>');
                $('.' + drop_id + ' option[value="' + val + '"]').attr("selected", "selected");
                $('.' + drop_id).focus();

            });
            $('.edit_dropdown').on('focusout', 'select', function () {
                var thiss = $(this).parent('.edit_dropdown');
                var data_id = thiss.attr('id');
                var res_id = data_id.split("-");
                var res_val = $(this).val();
                $.ajax({
                    type: 'POST',
                    cache: false,
                    data: {id: res_id[0], name: res_id[1], valuee: res_val},
                    url: '<?= Yii::$app->homeUrl; ?>/appointment/close-estimate/edit-estimate-service',
                    success: function (data) {
                        if (data == '') {
                            data = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        }
                        thiss.html(data);
                    }
                });

            });


        });
    </script>
</div>
