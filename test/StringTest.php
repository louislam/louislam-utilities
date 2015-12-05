<?php

class StringTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {

    }

    public function testContains()
    {
        $this->assertEquals(true, \LouisLam\LouisString::contains("Hello World", "Hello"));
    }
}

