<?php
class changePassword extends Controller
{
    public function Default()
    {
        $this->view("changePassword");
    }
    public function Process()
    {
        echo "change";
    }
}
