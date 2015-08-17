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
        $containIndex = String::contains($_SERVER["REQUEST_URI"], $_SERVER["SCRIPT_NAME"]);

        if ($containIndex) {
            return $_SERVER["SCRIPT_NAME"] . "/" . $relativePath;
        } else {
            $segments = explode("/", $_SERVER["SCRIPT_NAME"]);

            $phpFile = $segments[count($segments) - 1];
            return str_replace($phpFile, "", $_SERVER["SCRIPT_NAME"]) . $relativePath;
        }
    }

    public static function res($relativePath) {
        $segments = explode("/", $_SERVER["SCRIPT_NAME"]);
        $phpFile = $segments[count($segments) - 1];
        return str_replace($phpFile, "", $_SERVER["SCRIPT_NAME"]) . $relativePath;
    }
    
    public static function loadJSON($path)
    {
        $json = file_get_contents($path);
        return json_decode($json);
    }
}