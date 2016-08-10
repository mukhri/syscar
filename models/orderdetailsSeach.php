<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\orderdetails;

/**
 * orderdetailsSeach represents the model behind the search form about `app\models\orderdetails`.
 */
class orderdetailsSeach extends orderdetails
{
    /**
     * @inheritdoc
     */
    public $productName;//tambah nama product.
    public $status;//tambah nama product.
    public $customerName;//tambah nama product.
    
    public function rules()
    {
        return [
            [['orderNumber', 'quantityOrdered', 'orderLineNumber'], 'integer'],
            [['productCode','productName','status','customerName'], 'safe'],//tambah unutk search nama product
            [['priceEach'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = orderdetails::find()->joinWith(['productCode0','orderNumber0','orderNumber0.customerNumber0']);//tambah untuk carian nama.

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        //tambah sorting
        $dataProvider->sort->attributes['productName']=[
            'asc' => ['productName' => SORT_ASC],
            'desc' =>['productName'=>SORT_DESC],
        ];
        $dataProvider->sort->attributes['customerName']=[
            'asc' =>['customerName' => SORT_ASC],
            'desc' =>['customerName' => SORT_DESC],
        ];
         $dataProvider->sort->attributes['status']=[
            'asc' =>['status' => SORT_ASC],
            'desc' =>['status' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'orderNumber' => $this->orderNumber,
            'quantityOrdered' => $this->quantityOrdered,
            'priceEach' => $this->priceEach,
            'orderLineNumber' => $this->orderLineNumber,
        ]);

        $query->andFilterWhere(['like', 'orderdetails.productCode', $this->productCode]);//ralat Column 'productCode' in where clause is ambiguous
        $query->andFilterWhere(['like', 'productName', $this->productName]);//tambah untuk carian nama
        $query->andFilterWhere(['like', 'status', $this->status]);//tambah untuk carian nama
        $query->andFilterWhere(['like', 'customerName', $this->customerName]);//tambah untuk carian nama
        return $dataProvider;
    }
}
