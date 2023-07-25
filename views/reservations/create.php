<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Reservations $model */
/** @var app\models\Reservations $user */
/** @var app\models\Reservations $book */

$this->title = 'Vytvoření rezervace';
$this->params['breadcrumbs'][] = ['label' => 'Reservations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservations-create">

    <h1>Vytvoření rezervace</h1>
    <h3>Rezervace vytvářena uživatelem: <?= $user->username ?></h3>
    <h3>Rezervace vytvářena na knihu: <?= $book->name ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
