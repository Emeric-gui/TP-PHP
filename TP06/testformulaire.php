<?php
include("formulaire.php");

$formul1  = new formulaire("post", "testformulaire.php");
$text1 = "Votre nom";
$text2 = "Votre code";
$formul1->ajouterzonetexte($text1);
$formul1->ajouterzonetexte($text2);
$formul1->ajouterbutton();
$formul1->getForm();


//$text1_1 = str_replace(" ", "_", $text1);
//$text1_2 = str_replace(" ", "_", $text2);
//
//if(isset($_POST[$text1_1]) && isset($_POST[$text1_2])){
//    echo $_POST[$text1_1]."<br>";
//    echo $_POST[$text1_2]."<br>";
//}

?>
