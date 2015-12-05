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

}