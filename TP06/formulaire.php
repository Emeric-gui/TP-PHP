<h2>Exercice 2</h2>

<?php


class formulaire{

    private $zoneTexte = 0;


    public function __construct($meth, $url)
    {
        echo "<form action='".$url."' method='".$meth."'>";
    }


    public function ajouterzonetexte($name){
        $this->zoneTexte++;
        echo "<label>".$name." : </label><input type='text' name='zoneText".$this->zoneTexte."'><br>";
    }

    public function ajouterbutton(){
        echo "<input type='submit'><br>";
    }

    public function getForm(){
        echo "</form>";
    }
}

?>