<?php
class Index extends Controller
{
    function __construct()
    {

        // echo $_SESSION['sessionId'];
        $this->view("Index");
    }
}
