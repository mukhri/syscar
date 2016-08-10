<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\orderdetailsSeach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderdetails-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'orderNumber') ?>

    <?= $form->field($model, 'productCode') ?>

    <?= $form->field($model, 'quantityOrdered') ?>

    <?= $form->field($model, 'priceEach') ?>

    <?= $form->field($model, 'orderLineNumber') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
