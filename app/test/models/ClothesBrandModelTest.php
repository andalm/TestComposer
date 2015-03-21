<?php

use App\Library\DataBase;

class ClothesBrandModelTest extends PHPUnit_Framework_TestCase {

  public function __construct()
  {
    parent::__construct();
    DataBase::initialize();
  }

  public function testResults()
  {
    $replaced = \ClothesBrandQuery::create()
                  ->searchBrandsOrClothing("<p>totto</p> pants tommy ' Hilfiger asd coat kasdj totto asdjasdjl pants nike");

    //This result going to work if you have the same clothing and brands in the database
    $expected =
      "&lt;p&gt;totto&lt;/p&gt; <i>pants</i> tommy ' Hilfiger asd <i>coat</i> kasdj <b>totto</b> asdjasdjl <i>pants</i> <b>nike</b>";

    $this->assertContains($expected, $replaced);
  }
}
