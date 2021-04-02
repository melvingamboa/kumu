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
<h2>Event Info <a class="btn btn-sm btn-primary float-right" href="<?php echo Url::toRoute(['/admin/eventlist']) ?>" role="button">Back</a></h2>

<div class="event-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'event_name',
            'event_location',
            'event_date:datetime',
            [
                'attribute' => 'flag_show',
                'value' => (($model->flag_show == 'Y') ? "Show" : 'Hide'),
            ]
        ],
    ]) ?>


</div>
