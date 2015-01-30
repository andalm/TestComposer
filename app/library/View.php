<?php namespace App\Library;

class View extends Response
{
  /**
   *
   * @var {string} name of the view selected
   */
  protected $template;
  
  /**
   *
   * @var {array} parameters that going to pass the view
   */
  protected $vars = array();
  
  /**
   *
   * @var {string} layout selectd 
   */
  protected $layout; 
  
  /**
   *
   * @var {string} default layout
   */
  protected $defaultLayout = 'layout';
  
  /**
   *
   * @var {string} Folder that contains views of the controller selected
   */
  protected $folderViewController;
  
  /**
   *
   * @var {HeadView} Scripts and css handler
   */
  protected $head;
  
  /**
   * Class constructor
   * 
   * @param {string} $template name of the file that contains view
   * @param {array} $vars
   */
  public function __construct($template, $vars = array())
  {
    $this->template = $template;
    $this->vars = $vars;
    $this->head = new HeadView();
  }

  /**
   * @return {string} Get name of the file contains view
   */
  public function getTemplate()
  {
    return $this->template;
  }

  /**
   * @return {array} vars return all variables
   */
  public function getVars()
  {
    return $this->vars;
  }
  
  /**
   * 
   * @param {string} $template Set name of the template file
   */
  public function setTemplate($template)
  {
    $this->template = $template;
  }
  
  /**
   * 
   * @return {string} retorna Return full path of the view selected
   */
  public function getTemplateFileName()
  {
    return $this->pathApp . "/views/".
           Inflector::lowerCamel($this->folderViewController) . "/" . 
           Inflector::lowerCamel($this->template) . ".tpl.php";
  }
  
  /**
   * 
   * @param {array} $vars Set all variables of the view
   */
  public function setVars($vars = array())
  {
    $this->vars = $vars;
  }
  
  /**
   * 
   * @return {string} Get layout selected
   */
  public function getLayout()
  {
    return $this->layout;
  }
  
  /**
   * 
   * @return {string} Get default layout
   */
  public function getDefaultLayout()
  {
    return $this->defaultLayout;
  }
  
  
  /**
   * 
   * @param {string} $layout Set layout
   */
  public function setLayout($layout)
  {
    $this->layout = $layout;
  }
  
  /**
   * Set default layout, if the layout property is empty
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
  * @return {string} return full path of the layout selected
  */
  public function getLayoutFileName()
  {
    $this->resolveLayout();
    
    return $this->pathApp . "/views/" . Inflector::lowerCamel($this->layout) . ".tpl.php";
  }
  
  /**
   * 
   * @param {string} $folderViewController name of the folder, this contains all views of the
   *                 controller selectd
   */
  public function setFolderViewController($folderViewController = '')
  {
    $this->folderViewController = $folderViewController;
  }
  
  /**
   * 
   * @param {string} $src add url's file script
   */
  public function addScript($src = '')
  {
    $this->head->addScript($src);
  }
  
  /**
   * 
   * @param string $href add url's file css
   */
  public function addCss($href = '')
  {
      $this->head->addCssLink($href);
  }
  
  /**
   * 
   * @return {HeadView} Get this object
   */
  public function getHead()
  {
      return $this->head;
  }
  
  /**
   * 
   * @param {HeadView} $head Set this object
   */
  public function setHead(HeadView $head)
  {
      $this->head = $head;
  }     
  
  /**
   * This function begins build of the view that going to pass to browser
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
