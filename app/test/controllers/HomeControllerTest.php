<?php 

use App\Controllers\HomeController;

class HomeControllerTest extends PHPUnit_Framework_TestCase {
  
  public function testViewResponse()
  {
    $con = new HomeController();
    $this->assertContainsOnlyInstancesOf('App\Library\View', [$con->indexAction()]);
  }
}