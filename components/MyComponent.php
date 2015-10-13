<?php
/**
 * Created by PhpStorm.
 * User: tolga
 * Date: 13.10.2015
 * Time: 10:18
 */

namespace components;


use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class MyComponent extends Component
{
    public function blastOff()
    {
        echo "Houston, we have ignition...";
    }
}