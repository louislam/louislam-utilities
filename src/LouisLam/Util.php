<?php

namespace LouisLam;

/**
 * Created by PhpStorm.
 * User: Louis Lam
 * Date: 8/13/2015
 * Time: 4:04 PM
 */
class Util
{
    public static function displayName($str) 
    {
        return str_replace("_", " ", ucfirst($str));
    }

    public static  function url($relativePath) 
    {
        return str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]) . $relativePath;
    }
    
    public static function loadJSON($path)
    {
        $json = file_get_contents($path);
        return json_decode($json);
    }
}