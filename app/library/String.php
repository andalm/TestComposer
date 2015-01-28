<?php namespace App\Library;

class String extends Response
{
    /**
     *
     * @var string datos a envíar en formato de cadena de texto 
     */
    protected $string = '';
    
    /**
     * 
     * @param string $string datos a envíar en formato de cadena de texto 
     * @throws Exception se lanza si los datos no son tipo string
     */
    public function __construct($string = '')
    {
        if(is_string($string))
        {
            $this->string = $string;
        }
        else
        {
            throw new Exception("Dato no valido!!");
        }
    }
    
    /**
     * 
     * @return string retorna los datos contenidos
     */
    public function getString()
    {
        return $this->string;
    }
    
    /**
     * 
     * @param string $string setea loa propiedad con una cadena de texto 
     * @throws Exception se lanza si los datos no son tipo string
     */
    public function setString($string = '')
    {
        if(is_string($string))
        {
            $this->string = $string;
        }
        else
        {
            throw new Exception("Dato no valido!!");
        }
    }
     
    /**
     * Implementacion del metodo abstracto
     */
    public function execute()
    {
        echo $this->string;
    }

}

