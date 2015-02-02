<?php namespace App\Library;

class Request 
{
  /**
   *
   * @var {RequestUrl} Object functionality the url handler
   */
  protected $requestUrl;
  
  public function __construct($requestUrl = NULL)
  {
    $this->requestUrl = $requestUrl;
  }
  
  /**
   * 
   * @return {RequestUrl} Get this object instantiated within this class
   */
  public function getRequestUrl()
  {
    return $this->requestUrl;
  }
  
  /**
   * 
   * @param {RequestUrl} $requestUrl setear el objeto para manejo de urls
   */
  public function setRequestUrl($requestUrl = NULL)
  {
    $this->requestUrl = $requestUrl;
  }

      
  /**
   * This method execute the controller and action selected for parameters passed through the url
   */
  public function execute()
  {
    $nameSpaceClass      = $this->requestUrl->getNameSpace();
    $actionMethodName    = $this->requestUrl->getActionMethodName();
    $params              = $this->requestUrl->getParams();
    
    if (!class_exists($nameSpaceClass))
    {
      exit('Controller not found');
    }

    $controller = new $nameSpaceClass();

    $response = call_user_func_array([$controller, $actionMethodName], $params);
    
    $this->executeResponse($response);
  }
  
  /**
   * Execute any response to front-end, solely instances for the Response class
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
          exit('Response is not valid');
      }
  }

}
