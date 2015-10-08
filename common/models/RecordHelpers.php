<?php
/**
 * Created by PhpStorm.
 * User: tolga
 * Date: 08.10.2015
 * Time: 14:13
 */

namespace common\models;
use yii;

Class RecordHelpers
{

    /**
     * Example usage:
     * If ($already_exists = RecordHelpers::userHas('profile')) {
     * show profile with id with value of $already_exists
     * } else {
     * go to form to create profile
     * }
     * @param $model_name
     * @return bool
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
}