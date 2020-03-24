<form method="post">
    <label>Nom :</label><input type="text" name="nom"><br>
    <label>Prenom :</label><input type="text" name="prenom"><br>
    <label>Mail :</label><input type="text" name="mail"><br>
    <label>Age :</label>
    <?php echo "<select name='age'>";
    echo "<option value=\'\'>--Age--</option>";
        for($i=1;$i<100;$i++)
        {
        echo "<option value=".$i.">".$i."</option>";
        }
        echo "</select>"; ?>
<!--    <select name="age">-->
<!--        <option value="">--Age--</option>-->
<!--        <option value="0-20">0-20</option>-->
<!--        <option value="20-40">24-40</option>-->
<!--        <option value="41-60">41-60</option>-->
<!--        <option value="60+">60 et +</option>-->
<!--    </select>-->
    <br>
    <label for="mr">Monsieur :</label><input type="checkbox" name="sexe" id="mr" value="monsieur">
    <label for="mrs">Madame :</label><input type="checkbox" name="sexe" id="mrs" value="madame"><br>
    <input type="submit" value="Envoyer">

</form>

<?php

class Ex3{
    private $nom = "";
    private $prenom ="";
    private $mail = "";
    private $age = 0;
    private $HF = "";

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function getMail(){
        return $this->mail;
    }

    public function setMail($mail){
        $this->mail = $mail;
    }

    public function getAge(){
        return $this->age;
    }

    public function setAge($age){
        $this->age = $age;
    }

    public function getHF(){
        return $this->HF;
    }


    public function setHF($HF){
        $this->HF = $HF;
    }

    public function __construct($nom, $prenom, $mail, $age, $HF){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->age = $age;
        $this->HF = $HF;
    }
}

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['age']) && isset($_POST['sexe'])){
    $info = new Ex3($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['age'], $_POST['sexe']);

//    $info->setNom($_POST['nom']);
//    $info->setPrenom($_POST['prenom']);
//    $info->setMail($_POST['mail']);
//    $info->setAge($_POST['age']);
//    $info->setHF($_POST['sexe']);

    echo $info->getNom(). " ";
    echo $info->getPrenom(). " <br>";
    echo "mail :".$info->getMail()."<br>";
    echo "Age :".$info->getAge()."<br>";
    echo "Sexe :".$info->getHF()."<br>";

}

?>

