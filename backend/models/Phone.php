<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "phone".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $phone
 * @property integer $type_id
 *
 * @property PhoneType $type
 * @property User $user
 */
class Phone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'type_id'], 'integer'],
            [['phone'], 'string', 'max' => 15],
            [['type_id'],'in', 'range'=>array_keys($this->getTypeList())]
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
            'phone' => 'Phone',
            'type_id' => 'Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(PhoneType::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @getTypeList
     *
     */
    public function getTypeList() {
        $droptions = PhoneType::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'type', 'id');
    }
}
