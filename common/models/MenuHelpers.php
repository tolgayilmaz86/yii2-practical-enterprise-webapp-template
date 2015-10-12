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
use yii\helpers\ArrayHelper;
Class MenuHelpers
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
     * @param mixed $id model currently operating
     * @param mixed $action  page currently operating
     * @return menu items dependent of model and action
     */
    public static function getSideMenuItems($model_name, $id = '', $action = null)
    {
        $menuItems = [];
        switch ($model_name) {
            case 'profile':
                break;
            case 'address':
                break;
            case 'role':
                break;
            case 'phone':
                break;
            case 'user':
                $menuItems = [
                    [
                        'url' => '/user/',
                        'label' => 'Search',
                        'icon' => 'search'
                    ],
                    [
                        'url' => '/user/create/',
                        'label' => 'Create',
                        'icon' => 'plus'
                    ],
                    [
                        'url' => '/user/view/'.Yii::$app->user->id,
                        'label' => 'View',
                        'icon' => 'eye-open'
                    ],
                    [
                        'label' => 'Edit',
                        'icon' => 'edit',
                        'items' => [
                            ['label' => 'Profile', 'icon'=>'user', 'url'=>'/profile/update/'.$id],
                            ['label' => 'Address', 'icon'=>'road', 'url'=>'/address/update/'.$id],
                            ['label' => 'Phone', 'icon'=>'phone', 'url'=>'/phone/update/'.$id],
                            ['label' => 'Permissions', 'icon'=>'lock', 'url'=>'/permission/update/'.$id],
                            ['label' => 'Roles', 'icon'=>'eye-open', 'url'=>'/role/update/'.$id],
                            ['label' => 'Status', 'icon'=>'bell', 'url'=>'/status/update/'.$id],
                        ],
                    ],
                ];
                break;
            case 'configuration':
                $menuItems = [
                    [
                        'url' => '/configuration/',
                        'label' => 'Search',
                        'icon' => 'search'
                    ],
                    [
                        'url' => '/configuration/create/',
                        'label' => 'Create',
                        'icon' => 'plus'
                    ],
                ];
                break;
            case 'permission':
                break;
            case 'status':
                break;
            case 'site':
                break;
            default:
        }

        return $menuItems;
    }

}