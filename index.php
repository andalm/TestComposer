<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Library\RequestUrl;
use App\Library\Request;

$requestUrl = new RequestUrl($_GET['url']);
$request = new Request($requestUrl);
$request->execute();

