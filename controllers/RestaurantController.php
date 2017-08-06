<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use app\models\Restaurant;

/**
 * Description of RestaurantController
 *
 * @author vkalashnykov
 */
class RestaurantController extends AppController{
    public $relatedProducts;
    
    public function actionView($id){
        $restaurant= Restaurant::findOne($id);
//        $relatedProducts=array();
//        foreach($restaurant->products as $product){
//            if (isset($product->relatedProducts)){
//                foreach ($product->relatedProducts as $relatedProduct){
//                    array_push($relatedProducts, $relatedProduct);
//                }
//            }
//        }
//        debug($relatedProducts);
        return $this->render('view', compact('restaurant'));
    }
}
