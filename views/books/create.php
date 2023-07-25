<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Books $model */

$this->title = 'Vytvoření knihy';
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-create">

    <h1>Vytvořit knihu</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
