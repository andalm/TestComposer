<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Library\RequestUrl;
use App\Library\Request;
use Propel\Runtime\Propel;
use Propel\Runtime\Connection\ConnectionManagerSingle;
$serviceContainer = Propel::getServiceContainer();
$serviceContainer->setAdapterClass('test_composer', 'mysql');
$manager = new ConnectionManagerSingle();
$manager->setConfiguration(array (
  'dsn'      => 'mysql:host=localhost;dbname=test_composer',
  'user'     => '',
  'password' => '',
));
$serviceContainer->setConnectionManager('test_composer', $manager);

$brands = ClothesQuery::create()->find();
foreach($brands as $brand){
  echo $brand . "<br>";
}

$requestUrl = new RequestUrl($_GET['url']);
$request = new Request($requestUrl);
$request->execute();

