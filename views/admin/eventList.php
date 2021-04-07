<?php

use yii\helpers\Html;
use yii\helpers\Url;
$formatter = Yii::$app->formatter;
$this->title = 'Event List';
$this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php if(yii::$app->session->hasFlash('message')):?>
<div class="row">
        <div class="col-md-12" >
            <div class="alert alert-success" role="alert"><?php echo yii::$app->session->getFlash('message')?></div>
            </div>    
        </div>
  <?php endif;?>
   <div class="container-fluid">
       
        <div class="d-flex flex-row-reverse bd-highlight">
            <div class="p-2 bd-highlight"><a class="btn btn-primary" href="<?php echo Url::toRoute(['/admin/events']) ?>" role="button">Add Events</a></div>
        </div>
        
            <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Event Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Date</th>
                    <th scope="col">Show/hide</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if(count($events)): ?>
                <?php foreach($events as $event):?>
                <tr>
                    <td><?php echo $event->event_name ?></td>
                    <td><?php echo $event->event_location  ?></td>
                    <td><?php echo  $formatter->asDate($event->event_date)?></td>
                    <td><?php echo $event->flag_show == "Y" ? "Show" : "Hide" ;?></td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="<?php echo Url::toRoute(['/admin/viewevent', 'id' => $event->id]) ?>" role="button">View</a>
                        <?= Html::a('Update', ['updateevent', 'id' => $event->id], ['class' => 'btn btn-warning btn-sm']) ?>
                    <?php if(empty($count)):?>
                        <?= Html::a('Delete', ['deleteevent', 'id' => $event->id], [
                                'class' => 'btn btn-danger btn-sm',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                    <?php endif;?>
                        <?= Html::a('Registered Guest', ['registerguest', 'id' => $event->id], ['class' => 'btn btn-success btn-sm']) ?>
                    </td>   
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td>No records found</td>
                </tr>
           <?php endif; ?>
            </tbody>
            </table>
        </div>
</div>
