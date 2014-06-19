<?php

class HtmlHelper
{
    /**
     * 
     * @param string $src enlace de archivo js
     * @return string tag script generado
     */
    public static function scriptTag($src = '')
    {
        return "<script type='text/javascript' src='$src'></script>";
    }
    
    /**
     * 
     * @param string $href enlace de archivo css
     * @return string yag link generado
     */
    public static function cssLink($href = '')
    {
        return "<link rel='stylesheet' type='text/css' href='$href'>";
    }
    
    /**
     * 
     * @param string $href enlace del anchor
     * @param string $text texto que se mostrara en el link
     * @param array $htmlOptions opciones html
     * @return string tag anchor generado
     */
    public static function anchorTag($href = '', $text = '', $htmlOptions = array())
    {
        return "<a href='$href' " . self::keyImplode($htmlOptions) . ">$text</a>";        
    }
     
    /**
     * 
     * @param array $info array de informacion de la lista de anchors, $key texto
     * que se mostrará y $inf url del link
     * @param string $separator separador de los anchors
     * @param array $htmlOptions opciones html
     * @return string lista de anchors generada
     */
    public static function anchorTagList($info = array(), $separator = '', $htmlOptions = array())
    {
        $anchors = '';
        $separatorOpen = ($separator != '') ? "<$separator>" : '';
        $separatorClose = ($separator != '') ? "</$separator>" : '';
        
        foreach ($info as $key => $inf)
        {
            $anchors .= $separatorOpen . self::anchorTag($inf, $key, $htmlOptions) . $separatorClose;
        }
        
        return $anchors;
    }
    
    /**
     * 
     * @param array $options opciones a concatenar
     * @return opciones concatenadas
     */
    protected static function keyImplode($options)
    {
        $string = '';
        
        foreach($options as $key => $option)
        {
            $string .= "$key='$option' ";   
        }
        
        return $string;        
    }
}

