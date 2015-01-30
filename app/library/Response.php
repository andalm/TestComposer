<?php namespace App\Library;

abstract class Response {
  
  protected $pathApp = __DIR__ . "/..";
  
  abstract public function execute();

}