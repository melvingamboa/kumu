<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\actionCreate */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Add Guests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guests-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Guests', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
            'email_address:email',
            'phone_number',
            'gender',
            'street',
            'city',
            'country',
            'zipcode',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  


</div>
