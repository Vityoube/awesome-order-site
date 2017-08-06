<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property string $description
 * @property integer $parent_id
 * @property string $keywords
 * @property integer $product_category_id
 * @property integer $status
 * @property integer $restaurant_id
 *
 * @property OrderItems[] $orderItems
 * @property ProductCategory $productCategory
 * @property Restaurant $restaurant
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public $isOrdered;
    
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'product_category_id', 'restaurant_id'], 'required'],
            [['description'], 'string'],
            [['parent_id', 'product_category_id', 'status', 'restaurant_id'], 'integer'],
            [['name', 'keywords'], 'string', 'max' => 255],
            [['product_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['product_category_id' => 'id']],
            [['restaurant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Restaurant::className(), 'targetAttribute' => ['restaurant_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'No',
            'created_at' => 'Created',
            'updated_at' => 'Updated',
            'name' => 'Name',
            'description' => 'Description',
            'parent_id' => 'Parent',
            'keywords' => 'Keywords',
            'product_category_id' => 'Product Category',
            'status' => 'Status',
            'restaurant_id' => 'Restaurant',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'product_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurant()
    {
        return $this->hasOne(Restaurant::className(), ['id' => 'restaurant_id']);
    }
    
    public function getRelatedProducts(){
        return $this->hasMany(Product::className(), ['parent_id'=>'id']);
    }
}
