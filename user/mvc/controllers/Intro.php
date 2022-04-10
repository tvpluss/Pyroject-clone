<?php
class Intro extends Controller
{
    function Default()
    {
        // echo $_SESSION['sessionId'];
        $this->view("Intro");
    }
}
