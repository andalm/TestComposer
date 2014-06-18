<?php

class JSon extends Response
{
    /**
     *
     * @var array data datos a codificar en formato JSon 
     */
    protected $data = array();
    
    /**
     * 
     * @param array $data datos a codificar
     */
    public function __construct($data = array())
    {
        $this->data = $data;
    }
    
    /**
     * 
     * @return array obtener a datos a codificar
     */
    public function getData()
    {
        return $this->data;
    }
    
    /**
     * 
     * @param array $data setear datos a codificar
     */
    public function setData($data)
    {
        if(is_array($data))
        {
            $this->data = $data;
        }
        else 
        {
            throw new Exception('Datos recibidos no validos!');
        }
       
    }
    
    /**
     * 
     * @return string datos codificados en formato JSon
     */
    public function enconde()
    {
        return json_encode($this->data);
    }
    
    /**
     * Implementacion del metodo abstracto
     */
    public function execute()
    {
        echo $this->enconde();
    }
}
