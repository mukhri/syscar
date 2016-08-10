<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;//drop down
use app\models\Orders;//model
use app\models\Products;

/* @var $this yii\web\View */
/* @var $searchModel app\models\orderdetailsSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Orderdetails');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderdetails-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Orderdetails'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'orderNumber',
            'productCode',
            //'orderNumber0.status',
            [
                'attribute'=>'status',
                'value'=>'orderNumber0.status',
                'filter' => ArrayHelper::map(Orders::find()->asArray()->all(),'status','status')
            ],
            [
              'attribute'=>'customerName',
              'value'=>'orderNumber0.customerNumber0.customerName'  
            ],
           
            'orderNumber0.customerNumber0.salesRepEmployeeNumber0.lastName',
            [
                'attribute'=>'productName',
                'value'=>'productCode0.productName',
                 'filter' => ArrayHelper::map(Products::find()->asArray()->all(),'productName','productName')
            ],
            'quantityOrdered',
            'priceEach',
            'orderLineNumber',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
