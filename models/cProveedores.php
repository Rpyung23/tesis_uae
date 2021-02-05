<?php
if(file_exists('models/cDatos.php'))
{
    include('models/cDatos.php');
}else
{
    include('../models/cDatos.php');
}

class cProveedores extends cDatos
{
    private $email;


    public function __construct()
    {
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email): void
    {
        $this->email = $email;
    }

}