<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use app\models\Cart;
use app\models\Product;
use Yii;

/**
 * Description of CartController
 *
 * @author vkalashnykov
 */
class CartController extends AppController{
    
     public function actionAdd(){
        $id= Yii::$app->request->get('id');
        $qty= Yii::$app->request->get('qty');
        $relatedProductsId= Yii::$app->request->get('relatedProductsId');
//        debug($relatedProductsId);
        $product= Product::find()->where(['id'=>$id])->one();
//        debug($product);
        $restaurantId= Yii::$app->request->get('restaurantId');
        if (empty($product))return false;
        $session= Yii::$app->session;
        $session->open();
        $cart=new Cart();
        $relatedProducts=array();
        if (!empty($relatedProductsId)){ 
            $relatedProducts= Product::find()->where(['id'=>$relatedProductsId])->all();
//            debug($relatedProducts);            
        }
        $cart->addToCart($product,$qty,$relatedProducts,$restaurantId);
        
        if (Yii::$app->request->isAjax){
            $this->layout=false;
            $successMessage='Product: '.$product->name;
            if (!empty($relatedProducts)){
                $successMessage.=' with snaps: ';
                foreach ($relatedProducts as $relatedProduct){
                    $successMessage.=$relatedProduct->name.' ';                
                }
            }
            $successMessage.=' is ordered successfully';
            Yii::$app->session->setFlash('success',$successMessage);
//            Yii::$app->session->setFlash('key','success');
            return $successMessage;
//            return $this->refresh();
        }
            return $successMessage;
    }
    
    public function actionShow(){
        $session= Yii::$app->session;
        $session->open();
        $this->layout=false;
        return $this->render('cart-list', compact('session'));
    }
    
}
