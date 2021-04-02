<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use yii\helpers\Url;


$this->title = 'Update Event';
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
                                <?= $form->field($model, 'event_name') ;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($model, 'event_location');?>
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-sm-12">
                            <?php
                               
                                echo '<label>Start Date/Time</label>';
                                    echo DateTimePicker::widget([
                                        'name' => 'Events[event_date]',
                                        'options' => ['placeholder' => 'Select Date'],
                                        'pluginOptions' => [
                                            'autoclose'=>true,
                                            'format' => 'yyyy-mm-dd h:i:s',
                                            'todayHighlight' => true
                                        ]
                                    ]);
                                ?> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($model, 'flag_show')->radioList( ['Y' => 'Show', 'N' => 'Hide'] );?>
                            </div>
                        </div>


                    </div> 
                    <div class="col-md-12 mt-4 mb-5">
                                <?= Html::submitButton('Save Guest', ['class'=>'btn btn-primary']); ?>
                                <a href="<?php echo URL::to(['admin/eventlist']) ?>" class="btn btn-warning">Back</a>
                    </div>                      
                    
                </div>
            </div>
            <?php ActiveForm::end();?>
        </div>
    </div>
</div>
<script>
    $(function () {
         $('#events-event_date').datepicker();
    });
</script>
