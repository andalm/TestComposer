<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

return [
  "database" => [
    "connection" => [
      "host"      => "localhost",
      "db"        => "test_composer",
      "user"      => "root",
      "password"  => "123",
      "adapter"   => "mysql"
    ]
  ]
];