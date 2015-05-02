<?php

return [
  'propel' => [
    'database' => [
      'connections' => [
        'default' => [
          'adapter'    => 'mysql',
          'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
          'dsn'        => 'mysql:host=localhost;dbname=test_composer',
          'user'       => 'root',
          'password'   => '123',
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