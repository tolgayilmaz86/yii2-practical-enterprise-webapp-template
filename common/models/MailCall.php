<?php
/**
 * Created by PhpStorm.
 * User: tolga
 * Date: 08.10.2015
 * Time: 14:13
 */

namespace common\models;
use yii;

use common\models\RecordHelpers;
Class MailCall
{
    public static function sendTheMail($message_id)
    {
        return Yii::$app->mailer->compose()
            ->setTo(\Yii::$app->user->identity->email)
            ->setFrom(['no-reply@yourbussiness.com' => 'Yii 2 Build'])
            ->setSubject(RecordHelpers::getMessageSubject($message_id))
            ->setTextBody(RecordHelpers::getMessageBody($message_id))
            ->send();
    }

    public static function onMailableAction($action_name, $controller_name)
    {
        if ($message_id = RecordHelpers::findStatusMessage($action_name, $controller_name)){
            static::sendTheMail($message_id);
        }
    }
}