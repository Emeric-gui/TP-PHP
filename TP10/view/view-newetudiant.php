<?php
    session_start();

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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center">Ajout d'un étudiant</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="../controller/controller.php?func=insertStudent">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom"  required class="form-control">
                    <label for="prenom">Prenom</label>
                    <input type="text" id="prenom" name="prenom"  required class="form-control">
                    <label for="note">Note</label>
                    <input type="text" id="note" name="note"  required class="form-control">
                    <br>
                    <input type="submit" class="btn btn-primary" value="Confirmer">
                    <a class="btn btn-secondary" href="view-editetudiant.php" role="button">Modifier un étudiant</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>