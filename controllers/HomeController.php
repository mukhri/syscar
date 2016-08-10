<?php

namespace app\controllers;
use yii\data\ActiveDataProvider;//active data provider
use app\models\Employees;//model
use yii\data\ArrayDataProvider;//guna unutk api (lambat sikit) 

class HomeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionWelcome()
    {
        return $this->render('welcome');
    }
    public function actionEmployees() {
        $query =  Employees::find();//select * from employee.
        $query2 =  Employees::find()->all();//select * from employee.
        /* nak test...
        echo "<pre>";
        print_r($query);
        echo"/pre>";
        /*abis test.
         * 
         */
        $provider=new ActiveDataProvider([
            'query'=>$query,
            'pagination'=>['pagesize'=>10]
        ]);
         $provider2=new ArrayDataProvider([
            'allModels'=>$query2,
            'pagination'=>['pagesize'=>10]
        ]);
       $d['dataprovider']=$provider2;
       
        
        return $this->render('employees',$d);     
                
    }

}
