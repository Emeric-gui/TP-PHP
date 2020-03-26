<h2>Exercice 2</h2>

<?php


final class formulaire{

    public function __construct($meth, $url)
    {
        echo "<form action='".$url."' method='".$meth."'>";
    }

    public function ajouterzonetexte($name){
        $name = str_replace(" ", "_", $name);
        echo "<label>".$name." : </label><input type='text' name='".$name."'><br>";
    }

    public function ajouterbutton(){
        echo "<input type='submit'><br>";
    }

    public function getForm(){
        echo "</form>";
    }
}

?>