<?php

if (file_exists("models/cDatos.php"))
{
    require_once("models/cDatos.php");
}else
    {
        require_once("../models/cDatos.php");
    }


class cEmpresa extends cDatos
{
    private $id_empresa;

    public function getODatos(): cDatos
    {
        return $this->oDatos;
    }

    public function setODatos(cDatos $oDatos): void
    {
        $this->oDatos = $oDatos;
    }

    public function getIdEmpresa()
    {
        return $this->id_empresa;
    }

    public function setIdEmpresa($id_empresa): void
    {
        $this->id_empresa = $id_empresa;
    }

}