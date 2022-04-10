<?php
class Index extends Controller
{
    function __construct()
    {
        // echo $_SESSION['sessionId'];
    }
    function Default()
    {
        $this->view("Index");
    }
}
