<?php

namespace common\models;

use Yii;
use yii\db\Expression;
use \yii\db\ActiveRecord;
/**
 * This is the model class for table "status_message".
 *
 * @property integer $id
 * @property string $controller_name
 * @property string $action_name
 * @property string $status_message_name
 * @property string $subject
 * @property string $body
 * @property string $status_message_description
 * @property string $created_at
 * @property string $updated_at
 */
class StatusMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_message';
    }

    public function behaviors()
    {
        return [

            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),

            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['controller_name', 'action_name', 'status_message_name', 'subject', 'body', 'status_message_description'], 'required'],
            [['body'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['controller_name', 'action_name', 'status_message_name'], 'string', 'max' => 105],
            [['subject', 'status_message_description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'controller_name' => 'Controller Name',
            'action_name' => 'Action Name',
            'status_message_name' => 'Status Message Name',
            'subject' => 'Subject',
            'body' => 'Body',
            'status_message_description' => 'Status Message Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
