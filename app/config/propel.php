<?php

return [
  'propel' => [
    'database' => [
      'connections' => [
        'default' => [
          'adapter'    => 'mysql',
          'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
          'dsn'        => 'mysql:host=sql5.freemysqlhosting.net;dbname=sql575917',
          'user'       => 'sql575917',
          'password'   => 'jD4!rP3!',
          'attributes' => []
        ]
      ]
    ],
    'runtime' => [
      'defaultConnection' => 'default',
      'connections' => ['default']
    ],
    'generator' => [
      'defaultConnection' => 'default',
      'connections' => ['default']
    ]
  ]
];
