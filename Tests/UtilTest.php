<?php

use LouisLam\Util;

class UtilTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {

    }

    public function testUrl()
    {
        $this->assertEquals("/", Util::url("/"));
    }
}

