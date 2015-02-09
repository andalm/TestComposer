<?php namespace App\Library;

use Propel\Runtime\Propel;
use Propel\Runtime\Connection\ConnectionManagerSingle;

abstract class DataBase {
  public static function initialize ()
  {
    $config = require_once __DIR__ . "/../config/config.php";
    $serviceContainer = Propel::getServiceContainer();
    $serviceContainer->setAdapterClass($config['database']['connection']['db'], $config['database']['connection']['adapter']);
    $manager = new ConnectionManagerSingle();
    $manager->setConfiguration(array (
      'dsn'      => 'mysql:host='.$config['database']['connection']['host'].';dbname='.$config['database']['connection']['db'],
      'user'     => $config['database']['connection']['user'],
      'password' => $config['database']['connection']['password'],
    ));
    $serviceContainer->setConnectionManager($config['database']['connection']['db'], $manager);
  }
}