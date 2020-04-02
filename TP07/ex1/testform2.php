<?php

include("form2.php");

$form = new form2('POST','');
$form->ajouterzonetexte('Votre nom');
$form->ajouterzonetexte('Votre code');
$form->ajouterRadio('Homme');
$form->ajouterRadio('Femme');
$form->ajouterCheckbox('Tennis');
$form->ajouterCheckbox('Equitation');
$form->ajouterbouton();
$form->getform();

?>