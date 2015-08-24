<?php

class StringTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {

    }

    public function testContains()
    {
        $this->assertEquals(true, \LouisLam\String::contains("Hello World", "Hello"));
    }
}

