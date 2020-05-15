<?php
    header("Content-type: image/png");
    try {


        $bdd = new PDO('pgsql:host=localhost;port=5433;dbname=graphenotes;', 'testapp', 'test');
    }catch(Exception $e){
        die("Errreur");
    }
    $queryAvg= $bdd->query('select avg(note) as moyenne from notes group by etudiant;');
    $i =0;
    $moyenneEtd1 = 0;
    $moyenneEtd2 = 0;

    while($donneeMoyenne = $queryAvg->fetch()){
        if($i ==0){
//           echo ($moyenneEtd1 =  $donneeMoyenne['moyenne']);
            $moyenneEtd2 =  $donneeMoyenne['moyenne'];
        }else if($i==1){
//           echo ($moyenneEtd2 =  $donneeMoyenne['moyenne']);
            $moyenneEtd1 =  $donneeMoyenne['moyenne'];
        }
        $i++;
    }

    $queryEtd1 = $bdd->query('select note from notes where etudiant=\'E1\'');
    $queryEtd2 = $bdd->query('select note from notes where etudiant=\'E2\'');

    $image = imagecreate(500,500);

    $gris = imagecolorallocate($image, 120,120,120);
    $orange = imagecolorallocate($image, 255, 128, 0);
    $bleu = imagecolorallocate($image, 0, 0, 255);
    $bleuclair = imagecolorallocate($image, 156, 227, 254);
    $blanc = imagecolorallocate($image, 255, 255, 255);
    $noir = imagecolorallocate($image, 0, 0, 0);


    //etudiant1
    $noteAvant = 0;
    $j = 0;
    $hauteurAvant = 0;
    while($donneeEd1 = $queryEtd1->fetch()){
        if($j ==0){
            ImageLine ($image, 0, 85, 50, 85, $blanc);
            $hauteurAvant = 85;
        }else{
            if($noteAvant > $donneeEd1['note']){
                //on diminue
                ImageLine ($image, $j*50, $hauteurAvant -2, $j*50 + 50, $hauteurAvant -2, $blanc);
                $hauteurAvant -= 2;
            }else if($noteAvant < $donneeEd1['note']){
                //on augmente
                ImageLine ($image, $j*50, $hauteurAvant +2, $j*50 + 50, $hauteurAvant +5, $blanc);
                $hauteurAvant += 2;
            }
        }

        $noteAvant = $donneeEd1['note'];
        $j++;
    }


    //etudiant 2
    $noteAvant = 0;
    $j = 0;
    $hauteurAvant = 0;
    while($donneeEd2 = $queryEtd2->fetch()){
        if($j ==0){
            ImageLine ($image, 0, 110, 50, 110, $bleu);
            $hauteurAvant = 110;
        }else{
            if($noteAvant > $donneeEd2['note']){
                //on diminue
                ImageLine ($image, $j*50, $hauteurAvant -2, $j*50 + 50, $hauteurAvant -2, $bleu);
                $hauteurAvant -= 2;
            }else if($noteAvant < $donneeEd2['note']){
                //on augmente
                ImageLine ($image, $j*50, $hauteurAvant +2, $j*50 + 50, $hauteurAvant +5, $bleu);
                $hauteurAvant += 2;
            }
        }

        $noteAvant = $donneeEd2['note'];
        $j++;
    }




    imagestring($image, 4,130,15, "Notes des etudiants E1 et E2", $noir);
    imagestring($image, 4,260,380, "Moyenne des notes de E1 : ".$moyenneEtd1, $noir);
    imagestring($image, 4,267,400, "Moyenne des notes de E2 : ".$moyenneEtd2, $noir);
    imagestring($image, 4,40,400, "E1", $blanc);
    imagestring($image, 4,60,400, "E2", $bleu);

    imagepng($image);

