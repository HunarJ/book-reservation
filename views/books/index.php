<?php

use app\models\Books;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BookSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var Books $highestReservationBook */

$this->title = 'Knihy';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1>Seznam knih</h1>

    <p>
        <?php
        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->username === 'admin') {
            echo Html::a('Přidat knihu', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>

    <h3>Nejpůjčovanější kniha:</h3>
    <p><strong>
        <?= $highestReservationBook->name ?>
        </strong>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?=
    !Yii::$app->user->isGuest && Yii::$app->user->identity->username === 'admin' ? (
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name',
                'label' => 'Jméno knihy - Autor',

            ],
            [
                'attribute' => 'description',
                'label' => 'Popis',

            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Books $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ])
    ) : (
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'description',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{reservations}',
                'buttons' => [
                    'reservations' => function ($url, $model, $key) {
                        return Html::a('Rezervovat', ['reservations/create', 'book_id' => $model->id], ['class' => 'btn btn-primary']);
                    },
                ],
            ],
        ],
    ])
    );
    ?>


</div>
