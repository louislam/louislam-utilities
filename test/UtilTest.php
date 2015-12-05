<?php

use LouisLam\Util;

class UtilTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {

    }

    public function testDisplayName()
    {
        $this->assertEquals("User id", Util::displayName("user_id"));
    }
}

