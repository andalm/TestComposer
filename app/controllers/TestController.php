<?php namespace App\Controllers;

use App\Library\View;

class TestController {

  public function indexAction()
  {
    $view = new View('index');
    $view->addCss("//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css");
    $view->addCss("//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css");
    $view->addScript("https://code.jquery.com/jquery-git2.min.js");
    $view->addScript("//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js");
    return $view;
  }
}
