<?php

class Xml extends Response
{
    /**
     *
     * @var DOMDocument/string $xml datos a envíar en formato xml 
     */
    protected $xml;
    
    /**
     * 
     * @param DOMDocument/string $xml datos a envíar en formato xml
     * @throws Exception Se lanza si los datos psados no son validos
     */
    public function __construct($xml)
    {
       if($xml instanceof DOMDocument || is_string($xml))
       {
           $this->xml = $xml;
       }
       else
       {
           throw new Exception("Datos XML no validos!!");
       }
    }
    
    /**
     * 
     * @return string documento xml generado
     */
    public function getXml()
    {
       $this->resolveXmlDocument();
       
       return $this->xml->saveXML();
    }
    
    /**
     * 
     * @param DOMDocument/string $xml datos a envíar en formato xml
     * @throws Exception Se lanza si los datos psados no son validos
     */
    public function setXml($xml)
    {
       if($xml instanceof DOMDocument || is_string($xml))
       {
           $this->xml = $xml;
       }
       else
       {
           throw new Exception("Datos XML no validos!!");
       }
    }
    
    /**
     * Si la propiedad $xml es un tipo string se convierte en un objeto tipo 
     * DOMDocument a partir de la informacion contenida en el mismo, con esto
     * también se vaida que el xml generado en el string este bien.
     */
    protected function resolveXmlDocument()
    {
       if(is_string($this->xml))
       {
           $DOM = new DOMDocument('1.0', 'utf-8');
           $DOM->loadXML($this->xml);
           $this->xml = $DOM;
       }  
    }
    
    /**
     * Implementacion del metodo abstracto
     */
    public function execute()
    {
       echo $this->getXml();
    }

}

