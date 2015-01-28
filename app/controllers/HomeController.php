<?php namespace App\Controllers;

class HomeController {

    public function indexAction()
    {
        return new View('home', [
            'titulo' => 'Controlador y accion por defecto'
        ]);
    }

}
