<?php namespace App\Library;

class RequestUrl
{
    /**
     *
     * @var {string} Url generated for call a controller and an action 
     */
    protected $url;
    
    /**
     * @var {string} It's a initial part of the namespace
     */
    protected $baseNameSpace = "App\Controllers";
    
    /**
     *
     * @var {string} name of the controller selected
     */
    protected $controller;
    
    /**
     *
     * @var {string} name of the controller default
     */
    protected $defaultController = 'home';
    
    /**
     *
     * @var {string} name of the action selected
     */
    protected $action;
    
    /**
     *
     * @var {string} name of the action default
     */
    protected $defaultAction = 'index';
    
    /**
     *
     * @var {array} parameters passed to action
     */
    protected $params = array();
    
    /**
     * Class constructor, initializes the variable url
     *
     * @param {string} $url
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
     * Assign the name of the selected controller
     * 
     * @param {array} $segments segmented url
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
     * Assign the name of the selected action
     * 
     * @param {array} $segments segmented url
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
     * Assign of the parameters passed to url
     * 
     * @param {array} $segments segmented url
     */
    public function resolveParams(&$segments)
    {
      $this->params = $segments;
    }

    /**
     * 
     * @return {string} $url
     */
    public function getUrl()
    {
      return $this->url;
    }
    
    /**
     * 
     * @param {string} $url
     */
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
     * @return {string} controller name of the controller
     */
    public function getController()
    {
      return $this->controller;
    }
    
    /**
     * 
     * @return {string} Return the class name in camel case
     */
    public function getControllerClassName()
    {
      return Inflector::camel($this->getController()) . 'Controller';
    }
    
    /**
     * 
     * @return {string} Return the class file path
     */
    public function getNameSpace()
    {
      return $this->baseNameSpace . "\\" .$this->getControllerClassName();
    }
    
    /**
     * 
     * @return {string} Return the name of the selected action 
     */
    public function getAction()
    {
      return $this->action;
    }
    
    /**
     * 
     * @return {string} return action name in lower camel
     */
    public function getActionMethodName()
    {
      return Inflector::lowerCamel($this->getAction()) . 'Action';
    }
    
    /**
     * 
     * @return {array} return all variables passed for the url
     */
    public function getParams()
    {
      return $this->params;
    }
    
    /**
     * Clean and set the url segments at the class properties
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
     * @param {string} $url
     * @return {array} clean url segments
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
