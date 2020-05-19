<?php
    session_start();
    include("../model/model.php");

    if(!isset($_SESSION['user_id'])){
        header('Location: viewlogin.php');
    }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../controller/controller.php?func=Deco">Deconnexion</a>
            </li>
        </ul>
    </div>
</nav>




<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center">Administrateur - <?php echo $_SESSION['prenom']." ".$_SESSION['nom'];?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Mes étudiants
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Note</th>
                                <th scope="col">Modification</th>
                                <th scope="col">Suppression</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $bdd = dbConnect();
                            $request = $bdd->prepare('select * from etudiant where user_id=:user_id');
                            $request->execute(array('user_id'=>$_SESSION['user_id']));
                            if($request){
                                while($donnees = $request->fetch()){
                                    echo "<tr><td>".$donnees['id']."</td><td>".$donnees['nom']."</td><td>".$donnees['prenom']."</td><td>".$donnees['note']."</td>  <td><a class=\"btn btn-primary\" href=\"view-editetudiant.php?id=".$donnees['id']."\" role=\"button\">Modification</a></td><td><a class=\"btn btn-primary\" href=\"../controller/controller.php?func=Suppr&id=".$donnees['id']."\" role=\"button\">Suppression</a></td></tr>";
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                    <br>
                    <a class="btn btn-secondary" href="view-newetudiant.php" role="button">Ajout d'un etudiant</a>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Note moyenne
                </div>
                <div class="card-body">
                    <?php
                        $moyenne = $bdd->prepare('select avg(note) as moyenne from etudiant where user_id=:user_id');
                        $moyenne->execute(array('user_id'=>$_SESSION['user_id']));

                        $donnee = $moyenne->fetch();
                        echo $donnee['moyenne'];
                    ?>
                </div>
            </div>
        </div>


    </div>

</div>
</body>
</html>