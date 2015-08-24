<?php

use LouisLam\Util;

class StringTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {

    }

    public function testUrl()
    {
        $this->assertEquals("/", Util::url("/"));
    }
}

