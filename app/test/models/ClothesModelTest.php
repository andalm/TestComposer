<?php

use App\Library\DataBase;

class ClothesModelTest extends PHPUnit_Framework_TestCase {
  
  public function __construct()
  {
    parent::__construct();
    DataBase::initialize();
  }
  
  public function testCollection()
  {
    $brand = \ClothesQuery::create()->find();
    $this->assertContainsOnlyInstancesOf('Propel\Runtime\Collection\ObjectCollection', [$brand]);
  }
}