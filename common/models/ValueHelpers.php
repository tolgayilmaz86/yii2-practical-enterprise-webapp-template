<?php
/**
 * Created by PhpStorm.
 * User: tolga
 * Date: 08.10.2015
 * Time: 13:16
 */
namespace common\models;

use Yii;

use \backend\models\Role;
use \backend\models\User;
use \backend\models\Status;
Class ValueHelpers
{
    /**
     * return the value of a role name handed in as string
     * example: 'Admin'
     *
     * @param mixed $role_name
     * @return isset
     */
    public static function getRoleValue($role_name)
    {
        $role = Role::find('role_value')
            ->where(['role_name' => $role_name])
            ->one();
        return isset($role->role_value) ? $role->role_value : false;
    }

    /**
     * return the value of a status name handed in as string
     * example: 'Active'
     * @param mixed $status_name
     */
    public static function getStatusValue($status_name)
    {
        $connection = \Yii::$app->db;
        $sql = "SELECT status_value FROM status WHERE status_name=:status_name";
        $command = $connection->createCommand($sql);
        $command->bindValue(":status_name", $status_name);
        $result = $command->queryOne();
        return $result['status_value'];
    }

    /**
     * returns value of user_type_name so that you can
     * used in PermissionHelpers methods
     * handed in as string, example: 'Paid'
     *
     * @param mixed $user_type_name
     */
    public static function getUserTypeValue($user_type_name)
    {
        $connection = \Yii::$app->db;
        $sql = "SELECT user_type_value FROM user_type
                WHERE user_type_name=:user_type_name";

        $command = $connection->createCommand($sql);
        $command->bindValue(":user_type_name", $user_type_name);
        $result = $command->queryOne();
        return $result['user_type_value'];
    }

    public static function roleMatch($role_name)
    {
        $userHasRoleName = Yii::$app->user->identity->role->role_name;
        return $userHasRoleName == $role_name ? true : false;
    }

    public static function getUsersRoleValue($userId=null) {
        if ($userId == null)
        {
            $usersRoleValue = Yii::$app->user->identity->role->role_value;
            return isset($usersRoleValue) ? $usersRoleValue : false;
        }
        else
        {
            $user = User::findOne($userId);
            $usersRoleValue = $user->role->role_value;
            return isset($usersRoleValue) ? $usersRoleValue : false;
        }
    }

    public static function isRoleNameValid($role_name)
    {
        $role = Role::find('role_name')
            ->where(['role_name' => $role_name])
            ->one();
        return isset($role->role_name) ? true : false;
    }

    public static function statusMatch($status_name)
    {
        $userHasStatusName = Yii::$app->user->identity->status->status_name;
        return $userHasStatusName == $status_name ? true : false;
    }

    public static function getStatusId($status_name)
    {
        $status = Status::find('id')
            ->where(['status_name' => $status_name])
            ->one();
        return isset($status->id) ? $status->id : false;
    }

    public static function userTypeMatch($user_type_name)
    {
        $userHasUserTypeName = Yii::$app->user->identity->userType->user_type_name;
        return $userHasUserTypeName == $user_type_name ? true : false;
    }

}