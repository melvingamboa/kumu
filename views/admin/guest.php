<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Manage Guest';
$this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php if(yii::$app->session->hasFlash('message')):?>
<div class="row">
        <div class="col-md-12" >
            <div class="alert alert-success" role="alert"><?php echo yii::$app->session->getFlash('message')?></div>
    
            </div>    </div>
  <?php endif;?>
<div class="site-registration">
   <div class="container-fluid">
       
        <div class="d-flex flex-row-reverse bd-highlight">
            <div class="p-2 bd-highlight"><a class="btn btn-primary" href="<?php echo Url::toRoute(['/admin/eventlist']) ?>" role="button">Show Events</a></div>
            <div class="p-2 bd-highlight"> <a class="btn btn-primary" href="<?php echo Url::toRoute(['/admin/create']) ?>" role="button">Add Guests</a></div>
        </div>
        
            <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if(count($guests)): ?>
                <?php foreach($guests as $guest):?>
                <tr>
                    <td><?php echo $guest->first_name ?></td>
                    <td><?php echo $guest->last_name  ?></td>
                    <td><?php echo ($guest->gender == "M") ? "Male" : "Female"; ?></td>
                    <td><?php echo $guest->phone_number  ?></td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="<?php echo Url::toRoute(['/admin/view', 'id' => $guest->id]) ?>" role="button">View</a>
                        <?= Html::a('Update', ['update', 'id' => $guest->id], ['class' => 'btn btn-warning btn-sm']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $guest->id], [
                                'class' => 'btn btn-danger btn-sm',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
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
</div>
