<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Library\RequestUrl;
use App\Library\Request;
use Propel\Runtime\Propel;
use Propel\Runtime\Connection\ConnectionManagerSingle;
use App\Models\Brand;

$serviceContainer = Propel::getServiceContainer();
$serviceContainer->setAdapterClass('bookstore', 'mysql');
$manager = new ConnectionManagerSingle();
$manager->setConfiguration(array (
  'dsn'      => 'mysql:host=localhost;dbname=test_composer',
  'user'     => '',
  'password' => '',
));
$serviceContainer->setConnectionManager('default', $manager);

echo $brand->getFirstName(); // 'Jane'

$requestUrl = new RequestUrl($_GET['url']);
$request = new Request($requestUrl);
$request->execute();

