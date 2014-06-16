<?php

class View extends Response {

    protected $template;
    protected $vars = array();
    
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
     * Se ejecuta para concatenar todos los string de vistas
     */
    public function execute()
    {
        $template = $this->getTemplate();
        $vars = $this->getVars();

        call_user_func(function () use ($template, $vars) {
            extract($vars);
            ob_start();
            require "views/$template.tpl.php";
            $tpl_content = ob_get_clean();
            require "views/layout.tpl.php";
        });
    }

}