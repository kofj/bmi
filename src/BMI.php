<?php
namespace kofj\BMI;

/**
 *
 * @since  2015-03-26 18:21:23
 * @author Konsta Vesterinen <kvesteri@cc.hut.fi>
 * @author Jonathan H. Wage <jonwage@gmail.com>
 */

class BMI
{

    /**
     * 体重指数
     *
     * @var
     */
    public $BMI;

    public function __construct($height, $weight)
    {
        $height = $height / 100;
        $this->BMI = round($weight / ($height * $height), 1);
    }

    public function get()
    {
        return $this->BMI;
    }
}
