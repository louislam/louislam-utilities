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

    public static function urlEncodeWithoutSlash($path) {
        return implode('/', array_map('rawurlencode', explode('/', $path)));
    }

    public static function url($relativePath)
    {
        $containIndex = LouisString::contains($_SERVER["REQUEST_URI"], $_SERVER["SCRIPT_NAME"]);

        if ($containIndex) {
            return urlencode($_SERVER["SCRIPT_NAME"] . "/" . $relativePath);
        } else {
            $segments = explode("/", $_SERVER["SCRIPT_NAME"]);

            $phpFile = $segments[count($segments) - 1];

            return Util::urlEncodeWithoutSlash(str_replace($phpFile, "", $_SERVER["SCRIPT_NAME"]) . $relativePath);
        }
    }

    /**
     * Protocol "function" from http://stackoverflow.com/questions/4503135/php-get-site-url-protocol-http-vs-https
     * @param $relativePath
     * @return string
     */
    public static function fullURL($relativePath) {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        return Util::urlEncodeWithoutSlash($protocol . $_SERVER["SERVER_NAME"] . Util::url($relativePath));
    }

    /**
     * Relative Path for resources (jpg, png etc)
     * @param $relativePath
     * @return string
     */
    public static function res($relativePath)
    {
        $segments = explode("/", $_SERVER["SCRIPT_NAME"]);
        $phpFile = $segments[count($segments) - 1];

        return Util::urlEncodeWithoutSlash(str_replace($phpFile, "", $_SERVER["SCRIPT_NAME"]) . $relativePath);
    }
    
    public static function loadJSON($path)
    {
        $json = file_get_contents($path);

        return json_decode($json);
    }

    /**
     * Credit to: http://stackoverflow.com/questions/6054033/pretty-printing-json-with-php
     * @param $json
     * @return string
     */
    public static function prettyJSONPrint($json)
    {
        $result = '';
        $level = 0;
        $in_quotes = false;
        $in_escape = false;
        $ends_line_level = null;
        $json_length = strlen($json);

        for ($i = 0; $i < $json_length; $i++) {
            $char = $json[$i];
            $new_line_level = null;
            $post = "";
            if ($ends_line_level !== null) {
                $new_line_level = $ends_line_level;
                $ends_line_level = null;
            }
            if ($in_escape) {
                $in_escape = false;
            } else {
                if ($char === '"') {
                    $in_quotes = !$in_quotes;
                } else {
                    if (!$in_quotes) {
                        switch ($char) {
                            case '}':
                            case ']':
                                $level--;
                                $ends_line_level = null;
                                $new_line_level = $level;
                                break;

                            case '{':
                            case '[':
                                $level++;
                            case ',':
                                $ends_line_level = $level;
                                break;

                            case ':':
                                $post = " ";
                                break;

                            case " ":
                            case "\t":
                            case "\n":
                            case "\r":
                                $char = "";
                                $ends_line_level = $new_line_level;
                                $new_line_level = null;
                                break;
                        }
                    } else {
                        if ($char === '\\') {
                            $in_escape = true;
                        }
                    }
                }
            }
            if ($new_line_level !== null) {
                $result .= "\n" . str_repeat("\t", $new_line_level);
            }
            $result .= $char . $post;
        }

        return $result;
    }
}