<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "submenu".
 *
 * @property integer $id
 * @property integer $main_menu_id
 * @property string $name
 * @property string $link
 *
 * @property Permission[] $permissions
 * @property MainMenu $mainMenu
 */
class Submenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'submenu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['main_menu_id', 'name'], 'required'],
            [['main_menu_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['link'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'main_menu_id' => 'Main Menu ID',
            'name' => 'Name',
            'link' => 'Link',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermissions()
    {
        return $this->hasMany(Permission::className(), ['submenu_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainMenu()
    {
        return $this->hasOne(MainMenu::className(), ['id' => 'main_menu_id']);
    }
}
