<?php namespace App\Library;

class Inflector {
    
    /**
     * 
     * @param stroing $value cadena a la que se dará formato CamelCase
     * @return string cadena formateada
     */
    public static function camel($value)
    {
        $segments = explode('-', $value);

        array_walk($segments, function (&$item) {
            $item = ucfirst(strtolower($item));
        });

        return implode('', $segments);
    }

    /**
     * 
     * @param string $value cadena a la que se dará formato lowerCamel
     * @return string cadena formateada
     */
    public static function lowerCamel($value)
    {
        return lcfirst(static::camel($value));
    }

}