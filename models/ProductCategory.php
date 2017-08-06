<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_category".
 *
 * @property integer $id
 * @property string $updated_at
 * @property string $created_at
 * @property string $name
 * @property integer $status
 * @property string $description
 *
 * @property Product[] $products
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['updated_at', 'created_at'], 'safe'],
            [['name', 'status', 'description'], 'required'],
            [['status'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'No',
            'updated_at' => 'Updated',
            'created_at' => 'Created',
            'name' => 'Name',
            'status' => 'Status',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['product_category_id' => 'id']);
    }
}
