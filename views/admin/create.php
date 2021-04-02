<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Guests */

$this->title = 'Add Guests';
$this->params['breadcrumbs'][] = ['label' => 'Guests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guests-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
