<?php

/*
 * El frontend controller se encarga de
 * configurar nuestra aplicacion
 */
require 'config/config.php';

//Library
require 'library/RequestUrl.php';
require 'library/Request.php';
require 'library/Inflector.php';
require 'library/Response.php';
require 'library/View.php';
require 'library/JSon.php';
require 'library/Xml.php';
require 'library/String.php';

//Llamar al controlador indicado
$requestUrl = new RequestUrl($_GET['url']);
$request = new Request($requestUrl);
$request->execute();

