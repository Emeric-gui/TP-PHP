<h1>TP 6</h1>

<h2>Exercice 1</h2>

<?php

class foot{
    //attributs
    private $nom;
    private $nombre;
    static $nbEquipe =0;
    const MESSAGE = 'Nombre d\'équipes:';

    //methodes
    function __construct($nom, $nombre)
    {
        $this->nom = $nom;
        $this->nombre = $nombre;
        self::$nbEquipe++;
        echo "constructeur<br>";

    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo "Destructor<br>";
        self::$nbEquipe--;
    }

    public function display(){

        echo "L'équipe ".$this->nom." a ".$this->nombre." titres<br>";
    }
    static function displayEquipe(){
        echo "Nombre d'équipes :".self::$nbEquipe."<br>";
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }


    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

}

//$equipe1 = new foot();
//$equipe1->nom = "PSG";
//$equipe1->nombre = 12;
//$equipe1->display();


//$equipe2 = new foot();
//$equipe2->setNom("FC Nantes");
//$equipe2->setNombre(4);

//$equipe2->display();

$equipe1 = new foot("Marseille", 15);
$equipe2 = new foot("Nantes", 15);
$equipe3 = new foot("PSG", 15);
$equipe4 = new foot("OL", 15);
$equipe3->display();
foot::displayEquipe();
//fin
?>

