<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "configuration".
 *
 * @property string $conf_key
 * @property string $conf_value
 * @property string $class
 */
class Configuration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'configuration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['conf_key'], 'required'],
            [['conf_key'], 'string', 'max' => 255],
            [['conf_value', 'class'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'conf_key' => 'Conf Key',
            'conf_value' => 'Conf Value',
            'class' => 'Class',
        ];
    }
}
