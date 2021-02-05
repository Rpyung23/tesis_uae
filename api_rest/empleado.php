<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if(file_exists("conexion/conexion.php"))
{
    include("conexion/conexion.php");
}else
{
    include("../conexion/conexion.php");
}

if(file_exists('models/cEmpleado.php'))
{
    include('models/cEmpleado.php');
}else
{
    include('../models/cEmpleado.php');
}

if(file_exists('mysql/mysql_empleados.php'))
{
    include('mysql/mysql_empleados.php');
}else
{
    include('../mysql/mysql_empleados.php');
}


switch ($_SERVER['REQUEST_METHOD'])
{
    case 'PUT':

        $datos = json_decode(file_get_contents("php://input"),true);

        $oE = new cEmpleado();
        $oE->setRuc($datos["dni"]);
        $oE->setName($datos["name"]);
        $oE->setApellido($datos["apellido"]);
        $oE->setDirexion($datos["dire"]);
        $oE->setTelefono($datos["phone"]);

        echo json_encode(updateEmpleado($oE));
        http_response_code(200);
        break;
}


function updateEmpleado($oE)
{
    if(updateEmpleadoBD($oE))
    {
        return array("status"=>"update");
    }
    return array("status"=>"no_update");
}

?>
