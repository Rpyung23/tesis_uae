<?php
class cDatos
{
    private $name;
    private $ruc;
    private $telefono;
    private $direxion;

    public function __construct()
    {
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getRuc()
    {
        return $this->ruc;
    }

    public function setRuc($ruc)
    {
        $this->ruc = $ruc;
    }


    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getDirexion()
    {
        return $this->direxion;
    }

    public function setDirexion($direxion)
    {
        $this->direxion = $direxion;
    }



}