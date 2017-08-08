<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $first_name
 * @property string $last_name
 * @property double $sum
 * @property integer $restaurant_id
 *
 * @property Restaurant $restaurant
 * @property OrderItems[] $orderItems
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['status', 'address', 'email', 'phone', 'first_name', 'last_name', 'sum', 'restaurant_id'], 'required'],
            [['status', 'restaurant_id','qty'], 'integer'],
            [['address', 'last_name'], 'string'],
            [['sum'], 'double'],
            [['email', 'first_name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
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
            'status' => 'Status',
            'address' => 'Address',
            'email' => 'Email',
            'phone' => 'Phone',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'sum' => 'Sum',
            'restaurant_id' => 'Restaurant',
            'qty'=>'Quantity'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurant()
    {
        return $this->hasOne(Restaurant::className(), ['id' => 'restaurant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }
}
