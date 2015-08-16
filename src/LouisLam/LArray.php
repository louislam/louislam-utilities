<?php
/**
 * Created by PhpStorm.
 * User: Louis Lam
 * Date: 8/16/2015
 * Time: 11:27 PM
 */

namespace LouisLam;


class LArray
{

    /**
     * PHP : Remove object from array
     * http://stackoverflow.com/questions/3573313/php-remove-object-from-array
     * @param array $array
     * @param $value
     * @param bool|true $strict
     * @return array
     */
    public static function unsetValue(array $array, $value, $strict = TRUE)
    {
        if(($key = array_search($value, $array, $strict)) !== FALSE) {
            unset($array[$key]);
        }
        return $array;
    }
}