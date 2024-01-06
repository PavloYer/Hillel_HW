<?php

class GameController
{
    public function view()
    {
        require_once VIEWS . "GamePage.php";
    }

    public function process()
    {
        if (!empty($_POST['firstNum']) && !empty($_POST['secondNum'])) {
            $result = $_POST['firstNum'] + $_POST['firstNum'];
            $color = "green";
        } else {
            $result = "Fill all fields of the form!";
            $color = "red";
        }
        require_once VIEWS . "GamePage.php";
    }
}