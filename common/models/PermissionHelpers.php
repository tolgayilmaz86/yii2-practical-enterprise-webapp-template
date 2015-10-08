<?php
/**
 * Created by PhpStorm.
 * User: tolga
 * Date: 08.10.2015
 * Time: 13:28
 */

namespace common\models;

use yii;
use yii\helpers\Url;
use yii\web\Controller;
use common\models\ValueHelpers;
Class PermissionHelpers
{

    /**
     * check if the user is the owner of the record
     * use Yii::$app->user->identity->id for $userid, 'string' for model name
     * for example 'profile' will check the profile model to see if the user
     * owns the record. Provide the model instance, typically as $model->id as
     * the last parameter.
     * Returns true or false, so you can wrap in if statement
     *
     * @param mixed $model_name
     * @param mixed $model_id
     * @return success
     */
    public static function userMustBeOwner($model_name, $model_id)
    {
        $connection = \Yii::$app->db;
        $userid = Yii::$app->user->identity->id;

        $sql = "SELECT id FROM $model_name
                WHERE user_id=:userid AND id=:model_id";

        $command = $connection->createCommand($sql);

        $command->bindValue(":userid", $userid);
        $command->bindValue(":model_id", $model_id);

        if($result = $command->queryOne())
            return true;
        return false;
    }

    /**
     * method for requiring paid type user, if test fails, redirect to upgrade page
     * $user_type_name handed in as 'string', 'Paid' for example.
     * used two lines for if statement to avoid word wrapping
     *
     * @param mixed $user_type_name
     * @return \yii\web\Response
     */
    public static function requireUpgradeTo($user_type_name)
    {
        if (!ValueHelpers::userTypeMatch($user_type_name))
        {
            return Yii::$app->getResponse()->redirect(Url::to(['upgrade/index']));
        }
    }

    /**
     * @requireStatus
     * used two lines for if statement to avoid word wrapping
     * @param mixed $status_name
     * @return success
     */
    public static function requireStatus($status_name)
    {
        return ValueHelpers::statusMatch($status_name);
    }

    /**
     * @requireMinimumStatus
     * used two lines for if statement to avoid word wrapping
     * @param mixed $status_name
     * @return success
     */
    public static function requireMinimumStatus($status_name)
    {
        if ( Yii::$app->user->identity->status_id >=
            ValueHelpers::getStatusValue($status_name))
            return true;
        return false;
    }

    /**
     * @requireRole
     * used two lines for if statement to avoid word wrapping
     * @param mixed $role_name
     * @return success
     */
    public static function requireRole($role_name)
    {
        return ValueHelpers::roleMatch($role_name);
    }

    /**
     * @requireMinimumRole
     * used two lines for if statement to avoid word wrapping
     * @param mixed $role_name
     * @return success
     */
    public static function requireMinimumRole($role_name, $userId = null)
    {
        if (ValueHelpers::isRoleNameValid($role_name))
        {
            if ($userId == null)
            {
                $userRoleValue = ValueHelpers::getUsersRoleValue();
            }
            else
            {
                $userRoleValue = ValueHelpers::getUsersRoleValue($userId);
            }
            return
                $userRoleValue >= ValueHelpers::getRoleValue($role_name) ? true : false;
        }
        else
        {
            return false;
        }
    }
}