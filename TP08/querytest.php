<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Title</title>
</head>
<body>
<?php
include ('connexpdo.php');

$base = 'pgsql:host=localhost;port=5433;dbname=citations;';
$user = 'postgres';
$password = 'new_password';

try{
    $bdd = connexpdo($base, $user, $password);
}catch(Exception $e){
    die('Erreur :'.$e->getMessage());
}

$requeteNP = $bdd->query('select nom, prenom from auteur;');
$requeteCitations = $bdd->query('select phrase from citation;');
$requeteSiecle = $bdd->query('select numero from siecle;');


echo "<h2>Auteurs de la BDD</h2> <br>";
echo "<table> <thead><tr><th>Nom</th> <th>Prenom</th></tr></thead><tbody>";
while($donne = $requeteNP->fetch()){
    echo "<tr><td>".$donne['nom']."</td><td>".$donne['prenom']."</td></tr>";
}
echo "</toby></table>";

$requeteNP->closeCursor();

echo "<h2>Citations de la BDD</h2> <br>";
echo "<table><tbody>";
while($donneCitations = $requeteCitations->fetch()){
    echo "<tr><td>".$donneCitations['phrase']."</td></tr>";
}
echo "</toby></table>";

$requeteCitations->closeCursor();

echo "<h2>Siecle de la BDD</h2> <br>";
echo "<table><tbody>";
while($donneSiecle = $requeteSiecle->fetch()){
    echo "<tr><td>".$donneSiecle['numero']."</td></tr>";
}
echo "</toby></table>";

$requeteSiecle->closeCursor();
?>
</body>
</html>
