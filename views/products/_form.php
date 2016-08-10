<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'productCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productLine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productScale')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productVendor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'quantityInStock')->textInput() ?>

    <?= $form->field($model, 'buyPrice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MSRP')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
