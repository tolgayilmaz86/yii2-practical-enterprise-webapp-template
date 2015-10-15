<?php

namespace common\models;

use Yii;
use Yii\helpers\ArrayHelper;
use backend\models\Role;
use backend\models\Status;

/**
 * This is the model class for table "permission".
 *
 * @property integer $id
 * @property integer $role_id
 * @property integer $status_id
 * @property integer $main_menu_id
 * @property integer $submenu_id
 * @property boolean $view
 * @property boolean $list
 * @property boolean $update
 * @property boolean $create
 * @property boolean $delete
 *
 * @property MainMenu $mainMenu
 * @property Role $role
 * @property Status $status
 * @property Submenu $submenu
 */
class Permission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'permission';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'status_id'], 'integer'],
            [['view', 'update', 'create', 'delete', 'list'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role',
            'status_id' => 'or Status',
            'main_menu_id' => 'Permission Area',
            'submenu_id' => 'Sub-Operation',
            'view' => 'View',
            'update' => 'Update',
            'create' => 'Create',
            'delete' => 'Delete',
            'list' => 'List',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainMenu()
    {
        return $this->hasOne(MainMenu::className(), ['id' => 'main_menu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubmenu()
    {
        return $this->hasOne(Submenu::className(), ['id' => 'submenu_id']);
    }

    /**
     *  @getRoleList
     * get list of roles for dropdown
     */
    public static function getRoleList()
    {
        $droptions = Role::find()->asArray()->all();
        return Arrayhelper::map($droptions, 'role_value', 'role_name');
    }

    /**
     * @getStatusList
     * get list of statuses for dropdown
     */
    public static function getStatusList()
    {
        $droptions = Status::find()->asArray()->all();
        return Arrayhelper::map($droptions, 'status_value', 'status_name');
    }

    /**
     * @getMainMenuList
     * get list of statuses for dropdown
     */
    public static function getMainMenuList()
    {
        $droptions = [
            'user' => 'User',
            'profile' => 'User Profile',
            'user-password' => 'User Password',
            'user-role' => 'User Role',
            'status' => 'Status',
            'role-assign' => 'Role Assignment',
            'status-assign' => 'Status Assignment',
            'log' => 'Logs',
            'faq' => 'FAQ',
            'configuration' => 'Configuration',
            'permission' => 'Permission',
        ];
        return $droptions;
    }

    /**
     * @getSubMenuList
     * get list of statuses for dropdown
     */
    public static function getSubMenuList($mainMenu)
    {
        $droptions = [
            'user' => ['user-password'=>'User Password']
        ];
        return $droptions[$mainMenu];
    }
}
