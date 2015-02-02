<?php 

use App\Controllers\TestController;

class TestControllerTest extends PHPUnit_Framework_TestCase {
  
  public function testViewResponse()
  {
    $con = new TestController();
    $this->assertContainsOnlyInstancesOf('App\Library\View', [$con->indexAction()]);
  }
}