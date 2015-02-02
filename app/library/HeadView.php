<?php namespace App\Library;

class HeadView
{
    /**
     * @var array strings de enlaces de archivos js 
     */
    protected $script = array();
    
    /**
     *
     * @var array strings de enlaces de archivos css 
     */
    protected $css = array();
    
    /**
     * 
     * @param string $src enlace de archivo js
     * @throws Exception se lanza si los datos pasados no son validos
     */
    public function addScript($src)
    {
        if(is_string($src))
        {
            $this->script[] = $src;
        }
        else
        {
            throw new Exception("Invalid param");
        }
    }
    
    /**
     * 
     * @param string $href enlaces de archivos css
     * @throws Exception se lanza cuando los datos pasados no son validos
     */
    public function addCssLink($href)
    {
        if(is_string($href))
        {
            $this->css[] = $href;
        }
        else
        {
            throw new Exception("Invalid param");
        }
    }
    
    /**
     * Imprime el tag script con los enlaces pasados como parametros
     */
    public function getAllScript()
    {
        foreach ($this->script as $script)
        {
            echo HtmlHelper::scriptTag($script);
        }
    }
    
    /**
     * Impirme el tag link con los enlaces de archvios css pasados como parametros
     */
    public function getAllCssLink()
    {
        foreach ($this->css as $css)
        {
            echo HtmlHelper::cssLink($css);
        }
    }
}

