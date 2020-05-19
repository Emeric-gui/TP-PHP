<?php
    session_start();
    require ('../model/model.php');
    
    function insertUser(){
        $pass_hache = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
        $bdd = dbConnect();

        $maxidr = $bdd->query('SELECT MAX(id) as ide FROM utilisateur');
        $maxid = $maxidr->fetch();
        if(is_null($maxid['ide'])){
            $maxid['ide'] = 0;
        }

        $insert = $bdd->prepare('insert into utilisateur(id, login, password, mail, nom, prenom) values (:id, :login, :password, :mail, :nom, :prenom)');
        $insert->execute(array('id'=>$maxid['ide']+1,
                                'login'=>$_POST['pseudo'],
                                'password'=>$pass_hache,
                                'mail'=>$_POST['mail'],
                                'nom'=>$_POST['nom'],
                                'prenom'=>$_POST['prenom']));

        header('Location: ../index.php');
    }

    function verifUser(){
        $bdd = dbConnect();
        $mdp = $bdd->prepare("select id,login, password, nom, prenom from utilisateur where login=:login");
        $mdp->execute(array('login'=>$_POST['pseudo']));
        $result = $mdp->fetch();
        $isPasswordCorrect = password_verify($_POST['password'], $result['password']);

        if (!$result)
        {
            header('Location: ../view/viewlogin.php');
        }
        else
        {
            if ($isPasswordCorrect){
                session_start();
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['nom'] = $result['nom'];
                $_SESSION['prenom'] = $result['prenom'];
                header('Location: ../view/viewadmin.php');
            }else {
                header('Location: ../view/viewlogin.php');
            }
        }
    }

    function insertStudent(){
        if(!isset($_SESSION['user_id'])){
            header('Location: viewlogin.php');
        }else{
            $bdd = dbConnect();

            $maxide = $bdd->query('SELECT MAX(id) as ide FROM etudiant');
            $maxid = $maxide->fetch();
            if(is_null($maxid['ide'])){
                $maxid['ide'] = 0;
            }

            $insert = $bdd->prepare('insert into etudiant(id, user_id, nom, prenom, note) values (:id, :user_id, :nom, :prenom, :note)');
            $insert->execute(array('id'=>$maxid['ide']+1,
                'user_id'=>$_SESSION['user_id'],
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom'],
                'note'=>$_POST['note']));

            header('Location: ../view/viewadmin.php');
        }

    }


    function modifStudent(){
        if(!isset($_SESSION['user_id'])){
            header('Location: viewlogin.php');
        }else{
            $bdd = dbConnect();

            if($_SESSION['user_id']){
                $modification = $bdd->prepare('update etudiant set nom=:nom, prenom=:prenom, note=:note where id=:id');
                $modification->execute(array(
                    'nom'=>$_POST['nom'],
                    'prenom'=>$_POST['prenom'],
                    'note'=>$_POST['note'],
                    'id'=>$_POST['id']));

                header('Location: ../view/viewadmin.php');
            }else{
                header('Location: ../view/view-editetudiant.php');
            }
        }
    }

    function deleteStudent(){
        $bdd = dbConnect();
        $suppr = $bdd->prepare('delete from etudiant where id=:id');
        $suppr->execute(array('id'=>$_GET['id']));
        header('Location: ../view/viewadmin.php');
    }


    function deconnexion(){
        $_SESSION = array();
        session_destroy();
        header('Location: ../view/viewlogin.php');
    }




    if(isset($_GET['func'])){
        if($_GET['func'] == 'insertUser'){
            insertUser();
        }else if($_GET['func'] == 'VerifUser'){
            verifUser();
        }else if($_GET['func'] == 'insertStudent'){
            insertStudent();
        }else if($_GET['func'] == 'modifStudent'){
            modifStudent();
        }else if($_GET['func']== 'Suppr'){
            deleteStudent();
        }

        else if($_GET['func']== 'Deco'){
            deconnexion();
        }
    }