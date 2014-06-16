<?php

class View extends Response
{
    /**
     *
     * @var string nombre de la vista seleccionada 
     */
    protected $template;
    
    /**
     *
     * @var array parametros que se pasaran a la respuesta 
     */
    protected $vars = array();
    
    /**
     *
     * @var string layout seleccionado 
     */
    protected $layout; 
    
    /**
     *
     * @var string layout por defecto 
     */
    protected $defaultLayout = 'layout';
    
    /**
     * Constructor de la clase vista
     * 
     * @param string $template nombre del archivo de vista
     * @param array $vars
     */
    public function __construct($template, $vars = array())
    {
        $this->template = $template;
        $this->vars = $vars;
    }

    /**
     * @return string template nombre del arvhivo de la vista
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @return array vars retorna las variables que se pasa al objeto vista
     */
    public function getVars()
    {
        return $this->vars;
    }
    
    /**
     * 
     * @param string $template nombre del archivo template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }
    
    /**
     * 
     * @return string retorna la ruta completa del archivo template seleccionado
     */
    public function getTemplateFileName()
    {
        return "views/" . Inflector::lowerCamel($this->template) . ".tpl.php";
    }
    
    /**
     * 
     * @param array $vars asigna variables que se pasan a la vista
     */
    public function setVars($vars = array())
    {
        $this->vars = $vars;
    }
    
    /**
     * 
     * @return string obtenemos el layout por defecto
     */
    public function getLayout()
    {
        return $this->layout;
    }
    
    /**
     * 
     * @return string obtenemos el layout por defecto
     */
    public function getDefaultLayout()
    {
        return $this->defaultLayout;
    }
    
    
    /**
     * 
     * @param string $layout asignamos el layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
    
    /**
     * Asigna el layout por defecto
     */
    public function resolveLayout()
    {
        if(empty($this->layout))
        {
            $this->layout = $this->defaultLayout;
        }
    }
    
   /**
    * 
    * @return string retorna la ruta completa del layout seleccionado
    */
    public function getLayoutFileName()
    {
        $this->resolveLayout();
        
        return "views/" . Inflector::lowerCamel($this->layout) . ".tpl.php";
    }
    
    /**
     * Se ejecuta para concatenar todos los string de vistas
     */
    public function execute()
    {
        $layout = $this->getLayoutFileName();
        $template = $this->getTemplateFileName();
        $vars = $this->getVars();
        
        call_user_func(function () use ($layout, $template, $vars)
        {
            extract($vars);
            ob_start();
            require $template;
            $tpl_content = ob_get_clean();
            require $layout;
        });
    }

}
