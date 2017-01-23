<?php
$params = array_merge(
  require(__DIR__ . '/../../common/config/params.php'),
  require(__DIR__ . '/../../common/config/params-local.php'),
  require(__DIR__ . '/params.php'),
  require(__DIR__ . '/params-local.php')
);

return [
  'id'                  => 'app-api',
  'basePath'            => dirname(__DIR__),
  'controllerNamespace' => 'backend\controllers',
  'bootstrap'           => ['log'],
  'modules'             => [],
  'components'          => [
    'request'      => [
      // no need CSRF token
      'enableCsrfValidation' => false,
    ],
    'user'         => [
      'identityClass'   => 'common\models\User',
      'enableAutoLogin' => false,
      'enableSession' => false
    ],
    'log'          => [
      'traceLevel' => YII_DEBUG ? 3 : 0,
      'targets'    => [
        [
          'class'  => 'yii\log\FileTarget',
          'levels' => ['error', 'warning'],
        ],
      ],
    ],
    'errorHandler' => [
      'errorAction' => 'site/error',
    ],
    /*
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'rules' => [
        ],
    ],
    */
  ],
  'params'              => $params,
];