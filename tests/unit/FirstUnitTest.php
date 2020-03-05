<?php

namespace unit;

use PHPUnit\Framework\TestCase;

class FirstUnitTest extends TestCase{
    
    
    public function test_my_assert_true(){
        $this->assertTrue(true);
    }
    
    
    public function test_my_assert_false(){
        $this->assertFalse(false);
    }

    public function test_my_multiplication_equals(){
        $a = 5;
        $b = 4;
        $c = $a * $b;
        $this->assertEquals($c,20);
    }
}