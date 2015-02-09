<?php

use App\Library\DataBase;

class BrandModelTest extends PHPUnit_Framework_TestCase {
  
  public function __construct()
  {
    parent::__construct();
    DataBase::initialize();
  }
  
  public function testCollection()
  {
    $brand = \BrandQuery::create()->find();
    $this->assertContainsOnlyInstancesOf('Propel\Runtime\Collection\ObjectCollection', [$brand]);
  }
}