<!DOCTYPE html>
<hmtl>
    <head>
      <title>Citations</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="citation.php">Informations <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="recherche.php">Recherche</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="modification.php">Modification</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1>La Citation du jour</h1>
    <?php

    try{
        $bdd = new PDO("pgsql:host=localhost;port=5433;dbname=citations;", "postgres", "new_password");
    }catch(Exception $e){
        die('Erreur :'.$e->getMessage());
    }

    $requeteNbCitations = $bdd->query("select count(*) as \"nbCitations\" from citation where id<=6;");
    $nbCitations = $requeteNbCitations->fetch();
    echo "<hr/>Il y a <strong>".$nbCitations['nbCitations']."</strong> citations repertoriées.<br>";


    echo "Et voici l'une d'entre elles qui est générée aléatoirement :<br>";
    $entierRandom = rand(1,6);
    $requeteNbCitations->closeCursor();

    $requeteCitation = $bdd->prepare("select c.phrase, a.nom, a.prenom, s.numero from citation c, auteur a, siecle s  where c.id=:id 
                                                                                  and a.id=(select auteurid from citation where id = :id)
                                                                                    and s.id = (select siecleid from citation where id=:id);");
    $requeteCitation->execute(array("id"=>$entierRandom));

    $citation = $requeteCitation->fetch();
    echo "<strong>".$citation['phrase']."</strong><br>";
    echo "".$citation['prenom']." ".$citation['nom']." (".$citation['numero']." siècle)";





    ?>
    </body>
</hmtl>


