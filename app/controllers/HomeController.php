<?php namespace App\Controllers;

use App\Library\View;

class HomeController {

  public function indexAction()
  {
    return new View('home', [
      'title' => 'Controlador y accion por defecto'
    ]);
  }
}
