<?php

use app\models\Reservations;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ReservationsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Přehled rezervací';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservations-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>
        <? /*= Html::a('Create Reservations', ['create'], ['class' => 'btn btn-success']) */ ?>
    </p>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'user_id',
                'label' => 'Jméno uživatele',
                'value' => function ($model) {
                    return $model->user->username;
                }
            ],
            [
                'attribute' => 'book_id',
                'label' => 'Jméno knihy',
                'value' => function ($model) {
                    return $model->book->name;
                }
            ],
            [
                'attribute' => 'reserved_from',
                'label' => 'Rezervováno od',
                'value' => function ($model) {
                    return $model->reserved_from;
                }
            ],
            [
                'attribute' => 'reserved_to',
                'label' => 'Rezervováno do',
                'value' => function ($model) {
                    return $model->reserved_to;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Reservations $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
