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
    
    /**
     * 
     * @return \JSon datos en formato JSon
     */
    public function jsonAction()
    {
        return new JSon([
            'Llave 1' => 'Dato 1',
            'Llave 2' => 'Dato 2',
            'Llave 3' => 'Dato 3',
            'Llave 4' => 'Dato 4',
            'Llave 5' => 'Dato 5',
        ]);
    }
}


