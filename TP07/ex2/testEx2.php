<?php
include("Shape.php");
include ("Circle.php");
include ("Square.php");

$objCircle = new Circle(25);
$objSquare = new Square(5,22);

$tableau = array($objCircle, $objSquare);

foreach ($tableau as $value){
    $classe = get_class($value);
    $area = $value->getArea();
    echo $classe." Area : ".$area."<br/>";
}

?>
