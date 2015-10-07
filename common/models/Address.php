<?php

namespace common\models;

use Yii;
/**
 * This is the model class for table "address".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $street1
 * @property string $street2
 * @property string $street3
 * @property string $postal_code
 * @property string $type
 * @property string $country
 * @property string $city
 * @property string $state
 *
 * @property User $user
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'required'],
            [['id', 'user_id'], 'integer'],
            [['name', 'street1', 'street2', 'street3',
                'postal_code', 'type', 'country',
                'city', 'state'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'street1' => 'Street1',
            'street2' => 'Street2',
            'street3' => 'Street3',
            'postal_code' => 'Postal Code',
            'type' => 'Type',
            'country' => 'Country',
            'city' => 'City',
            'state' => 'State',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
