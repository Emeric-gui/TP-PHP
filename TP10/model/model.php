<?php

function dbConnect(){

    try{
        $bdd = new PDO('pgsql:host=localhost;port=5433;dbname=etudiants;', 'testapp', 'test');
        return $bdd;
    }catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }

}