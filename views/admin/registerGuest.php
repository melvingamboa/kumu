<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Registered Guest';
$this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="site-registration">
   <div class="container-fluid">
       
            <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $r):?>
                <tr>
                    <td><?php echo $r['first_name'] ?></td>
                    <td><?php echo $r['last_name']  ?></td>
                    <td><?php echo ($r['gender'] == "M") ? "Male" : "Female" ?></td>
                    <td><?php echo $r['phone_number']  ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
            <div class="row pb-5">
                    <div class="col-md-12"><td>
                        <a class="btn btn-primary btn-sm" href="<?php echo Url::toRoute(['/admin/eventlist']) ?>" role="button">Back</a>
                    </div>
            </div>
        </div>
    </div>
</div>
