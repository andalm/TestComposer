<?php namespace App\Library;

use Propel\Runtime\Propel;
use Propel\Runtime\Connection\ConnectionManagerSingle;

class DataBase {

  private static $serviceContainer = null;
  private static $manager = null;

  public static function initialize()
  {
    if(self::$serviceContainer == null && self::$manager == null)
    {
      $config = require_once __DIR__ . "/../config/config.php";
      self::$serviceContainer = Propel::getServiceContainer();
      self::$serviceContainer->setAdapterClass($config['database']['connection']['db'], $config['database']['connection']['adapter']);
      self::$manager = new ConnectionManagerSingle();
      self::$manager->setConfiguration(array (
        'dsn'      => 'mysql:host='.$config['database']['connection']['host'].';dbname='.$config['database']['connection']['db'],
        'user'     => $config['database']['connection']['user'],
        'password' => $config['database']['connection']['password'],
      ));
      self::$serviceContainer->setConnectionManager($config['database']['connection']['db'], self::$manager);
    }    
  }
}