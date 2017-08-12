<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use app\models\Product;
use app\models\Restaurant;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * Description of RestaurantController
 *
 * @author vkalashnykov
 */
class RestaurantController extends AppController{
    
    
    public function actionView($id){
        $restaurant= Restaurant::findOne($id);
        $products= Product::find()->where(['restaurant_id'=>$id])->andWhere(['parent_id'=>0])->all();
        foreach ($products as $product){
            $form= ActiveForm::begin([]);
            $relatedProductsId=array();
            if (isset($product->relatedProducts)){
                $product->content='';
                foreach ($product->relatedProducts as $relatedProduct){
                    $product->content.='<input type="checkbox" '
                            . 'id="related-product-'.$product->id.'-'.$relatedProduct->id.
                            '" data-id="'.$relatedProduct->id.'">'.($relatedProduct->name).'</input><br>';
                    array_push($relatedProductsId, $relatedProduct->id);
                }
            }
            $product->content.='<br><input type="number" id="qty'.$product->id.
                    '" step="1" min="1" value="1" class="pull-left" style="width: 10%;"/>'.
                Html::buttonInput('+',
                        ['class'=>'w3-button w3-circle w3-teal pull-right',
                            'data-id'=>$product->id,
                            'onclick'=>'addProduct('.$product->id.','.json_encode($relatedProductsId).','.$id.');']);
            ActiveForm::end();
       }
       $this->view->title=$restaurant->name;
       return $this->render('view', compact('restaurant','products'));
    }
   
    
    
}
