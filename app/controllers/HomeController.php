<?php namespace App\Controllers;

use App\Library\View;

class HomeController {

  public function indexAction()
  {
    return new View('home', [
      'titulo' => 'Controlador y accion por defecto'
    ]);
  }
}
