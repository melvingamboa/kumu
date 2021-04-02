<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Guests */

?>
<span> 
    <?php if(yii::$app->session->hasFlash('message')):?>
        <div class="col-md-12" >
            <div class="alert alert-success" role="alert"><?php echo yii::$app->session->getFlash('message')?></div>
        </div>
        <?php endif;?>
</span>
<h2>Guest Info <a class="btn btn-sm btn-primary float-right" href="<?php echo Url::toRoute(['/admin/guests']) ?>" role="button">Back</a></h2>

<div class="guests-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'first_name',
            'last_name',
            'email_address:email',
            'phone_number',
            'gender',
            'street',
            'city',
            'country',
            'zipcode',
        ],
    ]) ?>


</div>
