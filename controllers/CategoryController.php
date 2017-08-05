<?php
/**
 * Created by PhpStorm.
 * User: vkalashnykov
 * Date: 8/5/17
 * Time: 6:57 PM
 */

namespace app\controllers;


use app\models\Category;
use app\models\Restaurant;
use yii\web\View;

class CategoryController extends AppController
{

    public function actionIndex(){
        $this->view->title="Home";
        return $this->render('index',compact('categories'));
    }

    public function actionView($id){
        if (\Yii::$app->request->isAjax){
            $restaurants=Restaurant::find()->with('category')->where(['category_id'=>$id])->all();
            debug($restaurants);
            return $this->render('view',compact('restaurants'));
        }

    }

}