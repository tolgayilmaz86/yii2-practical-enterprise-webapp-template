<?php
/**
 * Created by PhpStorm.
 * User: tolga
 * Date: 08.10.2015
 * Time: 14:13
 */

namespace common\models;
use yii;

use \common\models\StatusMessage;
Class RecordHelpers
{

    /**
     * Checks for a user’s record on the model supplied
     * Example usage:
     * If ($already_exists = RecordHelpers::userHas('profile')) {
     * show profile with id with value of $already_exists
     * } else {
     * go to form to create profile
     * }
     * @param $model_name
     * @return the id of the record
     */
    public static function userHas($model_name)
    {
        $connection = \Yii::$app->db;
        $userid = Yii::$app->user->identity->id;

        $sql = "SELECT id FROM $model_name WHERE user_id=:userid";

        $command = $connection->createCommand($sql);
        $command->bindValue(":userid", $userid);

        $result = $command->queryOne();

        if ($result == null)
            return false;
        return $result['id'];
    }

    public static function findStatusMessage($action_name, $controller_name)
    {

        $result =  StatusMessage::find('id')
            ->where(['action_name' => $action_name])
            ->andWhere(['controller_name' => $controller_name])
            ->one();

        return isset($result['id']) ? $result['id'] : false;
    }

    public static function getMessageSubject($id)
    {
        $result =  StatusMessage::find('subject')
            ->where(['id' => $id])
            ->one();

        return isset($result['subject']) ?  $result['subject'] :  false;
    }

    public static function getMessageBody($id)
    {
        $result =  StatusMessage::find('body')
            ->where(['id' => $id])
            ->one();

        return isset($result['body']) ? $result['body'] : false;
    }
}