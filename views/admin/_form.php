<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Guests */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-registration">
   <div class="container-fluid">
        <?php 
        $form = ActiveForm::begin()?>
            <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($model, 'first_name') ;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($model, 'last_name');?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($model, 'email_address');?>   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                            <?= $form->field($model, 'phone_number');?>   
                            </div>
                        </div>
                        <div class="row">
                        <?php $items = ['M' => "Male", 'F' => 'Female']?>
                            <div class="col-sm-5">
                        

                                <?= $form->field($model, 'gender')->dropDownList($items,  ['prompt' => '---Select Gender---'])?>   
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($model, 'street');?>   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($model, 'city');?>   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($model, 'country');?>   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($model, 'zipcode');?>   
                            </div>
                        </div>

                    </div> 
                    <div class="col-md-12 mt-4 mb-5">
                                <?= Html::submitButton('Save Guest', ['class'=>'btn btn-primary']); ?>
                                <a href="<?php echo yii::$app->homeUrl; ?>" class="btn btn-warning">Back</a>
                    </div>                      
                    
                </div>
            </div>
            <?php ActiveForm::end();?>
        </div>
    </div>
</div>
