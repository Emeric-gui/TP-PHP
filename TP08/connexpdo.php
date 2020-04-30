<?php
function connexpdo($base, $user, $password){
    $bdd = new PDO($base, $user, $password);
    return $bdd;
}
?>