<?php

class ContactosController {
    
    /**
     * 
     * @return \View vista de la accion por defecto
     */
    public function indexAction()
    {
        return new View('contactos');
    }
    
    /**
     * 
     * @param string $ciudad nombre de la ciudad
     * @return \View retorna la vista de la accion
     */
    public function ciudadAction($ciudad = '')
    {
        $ciudad = empty($ciudad) ? 'Bogotá' : ucfirst($ciudad);
        
        return new View('ciudad', [
            'ciudad' => $ciudad
        ]);
    }

}