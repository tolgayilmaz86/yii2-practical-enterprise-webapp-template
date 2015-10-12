<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "configuration".
 *
 * @property integer $id
 * @property string $conf_key
 * @property string $conf_value
 * @property string $class_name
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
            [['conf_value'], 'string'],
            [['conf_key', 'class_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'conf_key' => 'Conf Key',
            'conf_value' => 'Conf Value',
            'class_name' => 'Class Name',
        ];
    }

    public static function getValue($key){
        $connection = \Yii::$app->db;

        $sql = "SELECT conf_value FROM configuraiton WHERE conf_key=:key";

        $command = $connection->createCommand($sql);
        $command->bindValue(":key", $key);

        $result = $command->queryOne();

        if ($result == null)
            return false;
        return $result['conf_value'];
    }
}
