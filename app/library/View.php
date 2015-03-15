<?php namespace App\Library;

use duncan3dc\Laravel\Blade;

class View extends Response
{
  /**
   *
   * @var {string} path of the views our project
   */
  protected $pathViews = __DIR__ . "/../views/";

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
  public function getFolderTemplate()
  {
    return $this->pathViews .
           Inflector::lowerCamel($this->folderViewController) . "/";
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
    $views              = $this->pathViews;
    $folderTemplate     = $this->getFolderTemplate();
    $template           = $this->template;
    $vars               = $this->getVars();
    $vars["headObject"] = $this->getHead();

    call_user_func(function () use ($views, $folderTemplate, $template, $vars)
    {
      Blade::addPath($views);
      Blade::addPath($folderTemplate);
      echo Blade::make($template, $vars)->render();
    });
  }

}
