<?php namespace App\Library;

class Request 
{
    /**
     *
     * @var RequestUrl Objeto que analiza la url 
     */
    protected $requestUrl;
    
    public function __construct($requestUrl = NULL)
    {
       $this->requestUrl = $requestUrl;
    }
    
    /**
     * 
     * @return RequestUrl obtener objeto para manejo de urls
     */
    public function getRequestUrl()
    {
        return $this->requestUrl;
    }
    
    /**
     * 
     * @param RequestUrl $requestUrl setear el objeto para manejo de urls
     */
    public function setRequestUrl($requestUrl = NULL)
    {
        $this->requestUrl = $requestUrl;
    }

        
    /**
     * Ejecuta el controlador y la accion seleccionados 
     */
    public function execute()
    {
        $controllerClassName = $this->requestUrl->getControllerClassName();
        $controllerFileName  = $this->requestUrl->getControllerFileName();
        $actionMethodName    = $this->requestUrl->getActionMethodName();
        $params              = $this->requestUrl->getParams();
        
        if ( ! file_exists($controllerFileName))
        {
            exit('controlador no existe');
        }

        require $controllerFileName;

        $controller = new $controllerClassName();

        $response = call_user_func_array([$controller, $actionMethodName], $params);
        
        $this->executeResponse($response);
    }
    
    /**
     * Ejecuta el tipo de respuesta al usuario
     * 
     * @param Response $response
     */
    public function executeResponse($response)
    {
        if($response instanceof View)
        {
            $response->setFolderViewController($this->requestUrl->getController());
        }
        
        if ($response instanceof Response)
        {
            $response->execute();
        }        
        else
        {
            exit('Respuesta no valida');
        }
    }

}







