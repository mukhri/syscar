<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\products */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Products',
]) . $model->productCode;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->productCode, 'url' => ['view', 'id' => $model->productCode]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
