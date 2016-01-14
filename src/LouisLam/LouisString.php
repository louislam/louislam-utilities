<?php
/**
 * Created by PhpStorm.
 * User: Louis Lam
 * Date: 8/11/2015
 * Time: 9:18 PM
 */

namespace LouisLam;


class LouisString
{

    /**
     * http://stackoverflow.com/questions/4366730/check-if-string-contains-specific-words
     * @param $str
     * @param $match
     * @return bool
     */
    public static function contains($str, $match) {
        return (strpos($str, $match) !== false);
    }

    public static function charAt($str, $index) {
        return mb_substr($str, $index, 1, 'utf-8');
    }

    /**
     * FROM: http://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php
     * @param $haystack
     * @param $needle
     * @return bool
     */
    public static function startsWith($haystack, $needle) {
        // search backwards starting from haystack length characters from the end
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
    }

    /**
     * FROM: http://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php
     * @param $haystack
     * @param $needle
     * @return bool
     */
    public static function endsWith($haystack, $needle) {
        // search forward starting from end minus needle length characters
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
    }

}