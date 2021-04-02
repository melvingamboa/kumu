<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Add Guest';
?>
<h1><?= Html::encode($this->title) ?></h1>

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

                    
                <!-- right side Events -->
                <div class="col-sm-6 events ">
                    <label for="">Events</label>
                    <?php if(count($events)):?>
                        <?php foreach($events as $event):?>
                            <div class="col-sm-12 mt-3 pt-1 card">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?php echo $event->id?>" name="Guests[event][]" id="defaultCheck1">
                                    <label class="form-check-label ml-5" for="defaultCheck1">
                                <?php echo $event->event_name?>
                                    </label>
                                    <div class="card-body">Location: <?php echo $event->event_location?></div>
                                    <div class="card-body">Date: <?php echo date('F m, Y', strtotime($event->event_date))?></div>
                                    <div class="card-body">Time: <?php echo date('h:i A',strtotime($event->event_date))?></div>
                                </div>  
                            </div>
                    <?php endforeach;?>
                    <?php else: ?>
                        <div class="col-md-12" >
                            <div class="alert alert-warning" role="alert">No events yet!</div>
                            </div>    
                        </div>
                    <?php endif;?>
                    </div>
                    <div class="col-md-12 mt-4 mb-5">
                        <?= Html::submitButton('Save Guest', ['class'=>'btn btn-primary']); ?>
                        <a href="<?php echo Url::to(['/admin/guests']); ?>" class="btn btn-warning">Back</a>
                    </div>                      
                </div>
            </div>
            <?php ActiveForm::end();?>
        </div>
    </div>
</div>
