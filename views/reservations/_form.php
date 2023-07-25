<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Reservations $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reservations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reserved_from')->input('date', ['class' => 'form-control', 'value' => date('Y-m-d')]) ?>

    <?= $form->field($model, 'reserved_to')->input('date', ['class' => 'form-control',  'value' => date('Y-m-d', strtotime('+1 month'))]) ?>

    <div class="form-group">
        <?= Html::submitButton('Rezervovat', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
