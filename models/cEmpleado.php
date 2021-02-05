<?php
if(file_exists('models/cDatos.php'))
{
    include('models/cDatos.php');
}else
{
    include('../models/cDatos.php');
}

if(file_exists('models/cUsuarios.php'))
{
    include('models/cUsuarios.php');
}else
{
    include('../models/cUsuarios.php');
}

if(file_exists('models/cEmpresa.php'))
{
    include('models/cEmpresa.php');
}else
{
    include('../models/cEmpresa.php');
}

if(file_exists('models/cPermisos.php'))
{
    include('models/cPermisos.php');
}else
{
    include('../models/cPermisos.php');
}


class cEmpleado extends cDatos
{
    private $oUser;
    private $apellido;
    private $oEmpresa;
    private $oPermiso;

    public function __construct()
    {
        $this->oUser = new cUsuarios();
        $this->oEmpresa = new cEmpresa();
        $this->oPermiso = new cPermisos();
    }


    public function getOUser(): cUsuarios
    {
        return $this->oUser;
    }

    /**
     * @param cUsuarios $oUser
     */
    public function setOUser(cUsuarios $oUser): void
    {
        $this->oUser = $oUser;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido): void
    {
        $this->apellido = $apellido;
    }

    /**
     * @return cEmpresa
     */
    public function getOEmpresa(): cEmpresa
    {
        return $this->oEmpresa;
    }

    /**
     * @param cEmpresa $oEmpresa
     */
    public function setOEmpresa(cEmpresa $oEmpresa): void
    {
        $this->oEmpresa = $oEmpresa;
    }

    /**
     * @return cPermisos
     */
    public function getOPermiso(): cPermisos
    {
        return $this->oPermiso;
    }

    /**
     * @param cPermisos $oPermiso
     */
    public function setOPermiso(cPermisos $oPermiso): void
    {
        $this->oPermiso = $oPermiso;
    }



}
?>