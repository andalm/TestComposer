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
    
    /**
     * 
     * @return \Xml datos en formato Xml
     */
    public function xmlAction()
    {
        // "Create" the document.
        $xml = new DOMDocument('1.0', 'utf-8');

        // Create some elements.
        $xml_album = $xml->createElement( "Album" );
        $xml_track = $xml->createElement( "Track", "The ninth symphony" );

        // Set the attributes.
        $xml_track->setAttribute( "length", "0:01:15" );
        $xml_track->setAttribute( "bitrate", "64kb/s" );
        $xml_track->setAttribute( "channels", "2" );

        // Create another element, just to show you can add any (realistic to computer) number of sublevels.
        $xml_note = $xml->createElement( "Note", "The last symphony composed by Ludwig van Beethoven." );

        // Append the whole bunch.
        $xml_track->appendChild( $xml_note );
        $xml_album->appendChild( $xml_track );

        // Repeat the above with some different values..
        $xml_track = $xml->createElement( "Track", "Highway Blues" );

        $xml_track->setAttribute( "length", "0:01:33" );
        $xml_track->setAttribute( "bitrate", "64kb/s" );
        $xml_track->setAttribute( "channels", "2" );
        $xml_album->appendChild( $xml_track );

        $xml->appendChild( $xml_album );
        
        header( "content-type: application/xml; charset=utf-8" );
        
        return new Xml($xml);
    }
    
    /**
    * 
    * @return \String datos en formato string
    */
    public function stringAction()
    {
        return new String("Cadena de texto pasada como parametro");
    }
    
    /**
     * 
     * @return \View vista de la accion prueba de integracion con Bootstrap
     */
    public function bootstrapAction()
    {
        $view = new View('bootstrap');
        $view->addCss("//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css");
        $view->addCss("//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css");
        $view->addScript("//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js");
        
        return $view;
    }
}


