<?php namespace App\Controllers;

use App\Library\View;
use App\Library\String;

class TestController {

  public function indexAction()
  {
    $view = new View('index');
    $view->addCss("//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css");
    $view->addCss("//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css");
    $view->addScript("https://code.jquery.com/jquery-git2.min.js");
    $view->addScript("//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js");
    $view->addScript("https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js");
    $view->addScript("https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular-sanitize.js");
    $view->addScript("/public/js/app.js");
    return $view;
  }

  public function searchAjaxAction()
  {
    $data     = json_decode(file_get_contents("php://input"));
    $response = \ClothesBrandQuery::create()->searchBrandsOrClothing($data->input);
    return new String($response);
  }
}
