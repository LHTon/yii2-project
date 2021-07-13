<?php declare(strict_types=1);

use yii\rest\UrlRule;

return [
  [
      'class' => UrlRule::class,
      'controller' => [
          'v1/controllers',
          'v2/salesDept/rest',
          'v2/advertDept/rest',
          'v2/projectDevDept/rest'
      ],

      //统一处理OPTIONS请求
      'extraPatterns' => [
          'OPTIONS <action:.*>' => 'options',
      ],
      //禁用末尾采用复数形式
      'pluralize' => false
  ]
];
