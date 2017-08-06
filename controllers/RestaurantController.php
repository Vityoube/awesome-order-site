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
    
    public function actionView($id){
        $restaurant= Restaurant::findOne($id);
        return $this->render('view', compact('restaurant'));
    }
}
