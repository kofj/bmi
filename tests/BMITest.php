<?php

use kofj\BMI\BMI;

class BMITest extends \PHPUnit_Framework_TestCase
{

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBMI()
    {
        $h171w60 = new BMI(171, 60);
        $this->assertEquals(20.5, $h171w60->get());
        $h171w61 = new BMI(171, 61);
        $this->assertEquals(20.9, $h171w61->get());
        $h171w62 = new BMI(171, 62);
        $this->assertEquals(21.2, $h171w62->get());
        $h171w63 = new BMI(171, 63);
        $this->assertEquals(21.5, $h171w63->get());
        $h171w64 = new BMI(171, 64);
        $this->assertEquals(21.9, $h171w64->get());
        $h171w65 = new BMI(171, 65);
        $this->assertEquals(22.2, $h171w65->get());
        $h171w66 = new BMI(171, 66);
        $this->assertEquals(22.6, $h171w66->get());
        $h171w67 = new BMI(171, 67);
        $this->assertEquals(22.9, $h171w67->get());
        $h171w68 = new BMI(171, 68);
        $this->assertEquals(23.3, $h171w68->get());
        $h171w69 = new BMI(171, 69);
        $this->assertEquals(23.6, $h171w69->get());
        $h171w70 = new BMI(171, 70);
        $this->assertEquals(23.9, $h171w70->get());
    }

}
