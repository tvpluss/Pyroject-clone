<?php
class Intro extends Controller
{
    function __construct()
    {

        // echo $_SESSION['sessionId'];
        $this->view("Intro");
    }
}
