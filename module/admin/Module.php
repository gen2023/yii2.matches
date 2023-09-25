<?php

namespace app\module\admin;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    public $layout = '/admin';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\module\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
