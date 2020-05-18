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
                <h2 style="text-align: center">Incription</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="../controller/controller.php?func=insertUser">
                    <div class="form-group">
                        <label for="pseudonyme">Pseudonyme</label>
                        <input type="text" id="pseudonyme" name="pseudo" class="form-control">
                        <label for="password">Mot de passe </label>
                        <input type="password" id="password" name="password" class="form-control" required>
                        <label for="mail">Adresse mail</label>
                        <input type="text" id="mail" name="mail"  required class="form-control">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom"  required class="form-control">
                        <label for="prenom">Prenom</label>
                        <input type="text" id="prenom" name="prenom"  required class="form-control">
                        <br>
                        <input type="submit" class="btn btn-primary" value="Confirmer">
                        <a class="btn btn-secondary" href="viewlogin.php" role="button">Deja inscrit ?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>