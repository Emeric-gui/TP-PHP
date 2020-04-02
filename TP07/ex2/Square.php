<?php


//class Square implements Shape
//{
//    private $width;
//    private $height;
//
//    public function getArea()
//    {
//       return ($this->width*$this->height);
//    }
//
//    public function __construct($width, $height)
//    {
//        $this->width = $width;
//        $this->height = $height;
//    }
//
//
//}

class Square extends Shape
{
    private $width;
    private $height;

    public function getArea()
    {
        return ($this->width*$this->height);
    }

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }


}
?>