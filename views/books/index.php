<?php

use app\models\Books;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BookSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Books';
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

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?=
    !Yii::$app->user->isGuest && Yii::$app->user->identity->username === 'admin' ? (
     GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'description',
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
            ],
        ],
    ])
    );
     ?>


</div>
