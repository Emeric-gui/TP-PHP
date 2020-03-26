<?php
include("formulaire.php");

class form2 extends formulaire{

    public function __construct($meth, $url)
    {
        parent::__construct($meth, $url);
    }

    public function ajouterRadio($name){
        echo "<label for id='".$name."'>".$name."</labelfor><input type='radio' id='".$name."'name='sec' value='".$name."'/><br>";
    }

    public function ajouterCheckbox($name){
        echo "<label for id='".$name."'>".$name."</labelfor><input type='checkbox' id='".$name."'name='sport' value='".$name."'/><br>";
    }

}