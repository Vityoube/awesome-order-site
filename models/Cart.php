<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\base\Model;

/**
 * Description of Cart
 *
 * @author vkalashnykov
 */
class Cart extends Model{
    //put your code here
    public function addToCart($product,$qty=1,$relatedProducts,$restaurantId){
        if (!isset($_SESSION['cart'][$restaurantId])){
            $restaurant= Restaurant::find()->where(['id'=>$restaurantId])->one();
            $_SESSION['cart'][$restaurantId]=[
                'name'=> $restaurant->name,
            ];
        }
        if (isset($_SESSION['cart'][$restaurantId][$product->id])){
            $_SESSION['cart'][$restaurantId][$product->id]['qty']+=$qty;
               
        } else {
            $_SESSION['cart'][$restaurantId][$product->id]=[
                        'qty'=>$qty,
                        'name'=>$product->name,
                        'price'=>$product->price,
                        'restaurantId'=>$restaurantId
                    ];
        }
        foreach ($relatedProducts as $relatedProduct){
            if (isset($_SESSION['cart'][$restaurantId][$product->id]['relatedProducts'])){
                if (isset($_SESSION['cart'][$restaurantId][$product->id]['relatedProducts'][$relatedProduct->id])){
                    $_SESSION['cart'][$restaurantId][$product->id]['relatedProducts'][$relatedProduct->id]['qty']
                            +=$qty;
                } else{
                    $_SESSION['cart'][$restaurantId][$product->id]['relatedProducts'][$relatedProduct->id]=[
                        'qty'=>$qty,
                        'name'=>$relatedProduct->name,
                        'price'=>$relatedProduct->price,
                        'restaurantId'=>$restaurantId,
                    ];
                }
        } else{
             $_SESSION['cart'][$restaurantId][$product->id]['relatedProducts'][$relatedProduct->id]=[
                        'qty'=>$qty,
                        'name'=>$relatedProduct->name,
                        'price'=>$relatedProduct->price,
                        'restaurantId'=>$restaurantId,
                    ];
        }                
                $_SESSION['cart.sum']=isset($_SESSION['cart.sum'])
               ? $_SESSION['cart.sum']+ $qty*$relatedProduct->price 
               : $qty*$relatedProduct->price;
                
            }
            $_SESSION['cart.qty']=isset($_SESSION['cart.qty'])? $_SESSION['cart.qty']+ $qty : $qty;
            $_SESSION['cart.sum']=isset($_SESSION['cart.sum'])
               ? $_SESSION['cart.sum']+ $qty*$product->price 
               : $qty*$product->price;
    }
}
