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
        $j=1;
        foreach ($products as $product){
            $form= ActiveForm::begin(['id'=>'product-form-'.$j]);
            if (isset($product->relatedProducts)){
                $product->content='';
                foreach ($product->relatedProducts as $relatedProduct){
                    $product->content.=$form->field($relatedProduct, 'isOrdered')->
                            label($relatedProduct->name)->checkbox();
                }
            }
            $product->content.='<br>'.$form->field($product, 'qty')->input('number',['step'=>1,'min'=>0,
                'class'=>'pull-left','style'=>'width: 10%;']).
                Html::buttonInput('+',
                        ['class'=>'w3-button w3-circle w3-teal pull-right',
                            'data-id'=>$product->id,
                            'onclick'=>'orderProduct('.$product->id.');']);
            ActiveForm::end();
            $j++;
       }
        return $this->render('view', compact('restaurant','products'));
    }
   
    
    
}
