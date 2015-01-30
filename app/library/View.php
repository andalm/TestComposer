<?php namespace App\Library;

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
     *
     * @var string carpeta donde se alamcenan las vista del controlador en concreto 
     */
    protected $folderViewController;
    
    /**
     *
     * @var HeadView objeto para manejo de scripts y css
     */
    protected $head;
    
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
        $this->head = new HeadView();
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
        return $this->pathApp . "/views/".
               Inflector::lowerCamel($this->folderViewController) . "/" . 
               Inflector::lowerCamel($this->template) . ".tpl.php";
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
        
        return $this->pathApp . "/views/" . Inflector::lowerCamel($this->layout) . ".tpl.php";
    }
    
    /**
     * 
     * @param string $folderViewController nombre del contrlador en donde se 
     * encuentran los templates
     */
    public function setFolderViewController($folderViewController = '')
    {
        $this->folderViewController = $folderViewController;
    }
    
    /**
     * 
     * @param string $src url de archivo js que se quiere añadir a la cabecera del 
     * documento
     */
    public function addScript($src = '')
    {
        $this->head->addScript($src);
    }
    
    /**
     * 
     * @param string $href url del archivo css que se quiere agregar a la cabecera 
     * del documento
     */
    public function addCss($href = '')
    {
        $this->head->addCssLink($href);
    }
    
    /**
     * 
     * @return HeadView obtener objeto de cabecera
     */
    public function getHead()
    {
        return $this->head;
    }
    
    /**
     * 
     * @param HeadView $head setear objeto de cabecera
     */
    public function setHead(HeadView $head)
    {
        $this->head = $head;
    }     
    
    /**
     * Se ejecuta para concatenar todos los string de vistas
     */
    public function execute()
    {
      $layout = $this->getLayoutFileName();
      $template = $this->getTemplateFileName();
      $headObject = $this->getHead();
      $vars = $this->getVars();
      
      call_user_func(function () use ($layout, $template, $headObject, $vars)
      {     
        extract($vars);
        ob_start();
        require $template;
        $tpl_content = ob_get_clean();
        require $layout;
      });
    }

}
