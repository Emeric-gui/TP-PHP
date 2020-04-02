<?php

//class Circle implements Shape
//{
//    private $radius;
//    public function getArea()
//    {
//        $area = $this->radius*2*pi();
//        return $area;
//    }
//
//    public function __construct($radius)
//    {
//        $this->radius = $radius;
//    }
//}
class Circle extends Shape
{
    private $radius;
    public function getArea()
    {
        $area = $this->radius*2*pi();
         return $area;
    }

    public function __construct($radius)
    {
        $this->radius = $radius;
    }
}
?>