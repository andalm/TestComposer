<?php namespace App\Library;

class RequestUrl
{
    /**
     *
     * @var string Url de la peticion
     */
    protected $url;
    
    /**
     *
     * @var string nombre del controlador seleccionado  
     */
    protected $controller;
    
    /**
     *
     * @var string nombre del controlador por defecto
     */
    protected $defaultController = 'home';
    
    /**
     *
     * @var string nombre de la accion seleccionada
     */
    protected $action;
    
    /**
     *
     * @var string nombre de la accion por defecto 
     */
    protected $defaultAction = 'index';
    
    /**
     *
     * @var array parametros pasados a la accion seleccionada
     */
    protected $params = array();
    
    /**
     * 
     * @param string $url pasada al constructor de la clase request
     */
    public function __construct($url = '')
    {
        if(is_string($url))
        {
            $this->url = $url;
        }
        else
        {
            $this->url = '';
        }
        
        $this->resolveSegments();
    }
    
    /**
     * Asigna el nombre del contralador seleccinado
     * 
     * @param array $segments url segmentada
     */
    public function resolveController(&$segments)
    {
        $this->controller = array_shift($segments);

        if (empty($this->controller))
        {
            $this->controller = $this->defaultController;
        }
    }
    
    /**
     * Asigna el nombre de la accion seleccinada
     * 
     * @param array $segments url segmentada
     */
    public function resolveAction(&$segments)
    {
        $this->action = array_shift($segments);

        if (empty($this->action))
        {
            $this->action = $this->defaultAction;
        }
    }
    
    /**
     * Asigna los paramentros pasador por la url
     * 
     * @param array $segments url segemenetada
     */
    public function resolveParams(&$segments)
    {
        $this->params = $segments;
    }

    /**
     * 
     * @return string $url retorna la url
     */
    public function getUrl()
    {
        return $this->url;
    }
    
    public function setUrl($url = '')
    {
        if(is_string($url))
        {            
            $this->url = $url;
        }
        else
        {
            $this->url = '';
        }
        
        $this->resolveSegments();
    }
    
    /**
     * 
     * @return string retorna el nombre del controlador 
     */
    public function getController()
    {
        return $this->controller;
    }
    
    /**
     * 
     * @return string Devuelve el nombre de la clase con formato del estsandar
     */
    public function getControllerClassName()
    {
        return Inflector::camel($this->getController()) . 'Controller';
    }
    
    /**
     * 
     * @return string Devuelve el nombre del archivo que contiene la clase 
     */
    public function getControllerFileName()
    {
        return 'controllers/' . $this->getControllerClassName() . '.php';
    }
    
    /**
     * 
     * @return string devuelve el nombre de la accion seleccionada
     */
    public function getAction()
    {
        return $this->action;
    }
    
    /**
     * 
     * @return string devuelve el nombre de la accion seleccionada con el formato
     * standar
     */
    public function getActionMethodName()
    {
        return Inflector::lowerCamel($this->getAction()) . 'Action';
    }
    
    /**
     * 
     * @return array retorna los parametros pasados por url
     */
    public function getParams()
    {
        return $this->params;
    }
    
    /**
     * Asigna los segmentos de la url a su respectiva propiedad de la clase
     */
    protected function resolveSegments()
    {
        $segments = self::clean($this->getUrl());
        $this->resolveController($segments);
        $this->resolveAction($segments);
        $this->resolveParams($segments);
    }
    
    /**
     * 
     * @param string $url string que representa la url pasada como parametro
     * @return array segmentos de url limpios de caracteres extraños
     */
    public static function clean($url = '')
    {
        $segments = explode('/', urldecode($url));
        
        array_walk($segments, function (&$item) {
            $item = preg_replace('/[^\w\.@-]/', '$1', $item);
        });
        
        return $segments;
    }
}
