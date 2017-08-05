<?php
/**
 * Created by PhpStorm.
 * User: vkalashnykov
 * Date: 8/5/17
 * Time: 7:29 PM
 */

namespace app\components;


use app\models\Category;
use yii\base\Widget;

class CategoryWidget extends Widget
{

    public function run(){
        $categories=Category::find()->indexBy('id')->all();
        return $this->render('menu',compact('categories'));
    }
}