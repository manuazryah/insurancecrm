<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20'], // adjust this to your needs
            'generators' => [//here
                'crud' => [// generator name
                    'class' => 'yii\gii\generators\crud\Generator', // generator class
                    'templates' => [//setting for out templates
                        'custom' => '@common/myTemplates/crud/custom', // template name => path to template
                    ]
                ]
            ],
        ],
        'admin' => [
            'class' => 'backend\modules\admin\Module',
        ],
        'masters' => [
            'class' => 'backend\modules\masters\Module',
        ],
        'company' => [
            'class' => 'backend\modules\company\Module',
        ],
        'policy' => [
            'class' => 'backend\modules\policy\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\AdminUsers',
            'enableAutoLogin' => true,
            'loginUrl' => ['site/index'],
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                    [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'admin-posts/<action>' => 'admin/admin-posts/<action>',
                'admin-users/<action>' => 'admin/admin-users/<action>',
                'country/<action>' => 'masters/country/<action>',
                'state/<action>' => 'masters/state/<action>',
                'product/<action>' => 'masters/product/<action>',
                'policy-type/<action>' => 'masters/policy-type/<action>',
                'cover/<action>' => 'masters/cover/<action>',
                'application-status/<action>' => 'masters/application-status/<action>',
                'company-details/<action>' => 'company/company-details/<action>',
                'company-contacts/<action>' => 'company/company-contacts/<action>',
                'policy-details/<action>' => 'policy/policy-details/<action>',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => []
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],
    ],
    'params' => $params,
];
