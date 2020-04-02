<?php
include ("traitEx3.php");

class Texte
{
    use UN, DEUX{
        UN::big insteadof DEUX;
        DEUX::small insteadof UN;
        DEUX::big as gros;
        UN::small as petit;
    }

}