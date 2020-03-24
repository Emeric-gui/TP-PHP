<?php
include("formulaire.php");

$formul1  = new formulaire("post", "testformulaire.php");
$formul1->ajouterzonetexte("Votre nom");
$formul1->ajouterzonetexte("Votre code");
$formul1->ajouterbutton();
$formul1->getForm();
?>
