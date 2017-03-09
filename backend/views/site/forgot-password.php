<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<div class="login-container">

        <div class="row">

                <div class="col-sm-6">

                        <script type="text/javascript">
                                jQuery(document).ready(function ($)
                                {
                                        setTimeout(function () {
                                                $(".fade-in-effect").addClass('in');
                                        }, 1);

                                });
                        </script>
                        <!-- Errors container -->
                        <div class="errors-container">
                        </div>

                        <!-- Add class "fade-in-effect" for login form effect -->
                        <?php
                        $form = ActiveForm::begin(
                                        [
                                            'id' => 'forgot-email',
                                            'method' => 'post',
                                            'options' => [
                                                'class' => 'login-form fade-in-effect'
                                            ]
                                        ]
                        );
                        ?>
                        <?php if (Yii::$app->session->hasFlash('error')): ?>
                                <div class="alert alert-danger" role="alert">
                                        <?= Yii::$app->session->getFlash('error') ?>
                                </div>
                        <?php endif; ?>
                        <?php if (Yii::$app->session->hasFlash('success')): ?>
                                <div class="alert alert-success" role="alert">
                                        <?= Yii::$app->session->getFlash('success') ?>
                                </div>
                        <?php endif; ?>
                        <label class="control-label" for="adminusers-user_name" style="    color: white;
                               font-size: 14px;
                               font-weight: bold;">Email/Username
                        </label>
                        <div class="form-group">
                                <label class="control-label" for="adminusers-user_name">User Name/ Email</label>
                                <input type="text" id="adminusers-user_name" class="form-control" name="AdminUsers[user_name]" maxlength="30" aria-invalid="false">

                                <div class="help-block"></div>
                        </div>

                        <div class="form-group" style="float: right;">
                                <button type="submit" class="btn btn-primary" style="margin-top: 18px;">Submit</button>    </div>
                                <?php ActiveForm::end(); ?>


                </div>

        </div>

</div>
