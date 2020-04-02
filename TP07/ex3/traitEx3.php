<?php

trait UN
{
    public function small($text)
    {
        echo("<small>" . $text . "</small><br/>");
    }

    public function big($text)
    {
        echo("<h4>" . $text . "</h4><br/>");
    }
}


trait DEUX{
    public function small($text)
    {
        echo("<i>" . $text . "</i><br/>");
    }

    public function big($text)
    {
        echo("<h2>" . $text . "</h2><br/>");
    }
}


