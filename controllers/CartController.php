<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

/**
 * Description of CartController
 *
 * @author vkalashnykov
 */
class CartController extends AppController{
    
     public function order(){
        if (\Yii::$app->request->isAjax){
//            $id= \Yii::$app->request->post();            
//            $product= \app\models\Product::find($id)->one();
            return 'Works';
//            return $this->refresh();
        }
    }
    
}
