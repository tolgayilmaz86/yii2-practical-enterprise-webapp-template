<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "permission".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $main_menu_id
 * @property integer $submenu_id
 * @property boolean $create
 * @property boolean $update
 * @property boolean $view
 * @property boolean $delete
 *
 * @property MainMenu $mainMenu
 * @property Submenu $submenu
 * @property User $user
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
            [['user_id', 'main_menu_id', 'submenu_id'], 'integer'],
            [['create', 'update', 'view', 'delete'], 'boolean']
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
            'main_menu_id' => 'Main Menu ID',
            'submenu_id' => 'Submenu ID',
            'create' => 'Create',
            'update' => 'Update',
            'view' => 'View',
            'delete' => 'Delete',
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
    public function getSubmenu()
    {
        return $this->hasOne(Submenu::className(), ['id' => 'submenu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
