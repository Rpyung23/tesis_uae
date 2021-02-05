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

if(file_exists('mysql/mysql_usuarios.php'))
{
    include('mysql/mysql_usuarios.php');
}else
{
    include('../mysql/mysql_usuarios.php');
}

switch($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        /** LOGIN **/
        $id = json_decode(file_get_contents("php://input"),true);

        if($_SERVER['REQUEST_URI']=="/tesis_uae/api_rest/usuarios.php/validation_user")
        {
            echo json_encode(validationUsuario($id["id"]));
        }else
            {
                echo json_encode(readUsuario($id["id"],$id["pass"]));
                http_response_code(200);
            }

        break;
    case 'POST':
        /** CREAR NUEVO USUARIO **/
        $oE = new cEmpleado();

        $datos = json_decode(file_get_contents("php://input"),true);

        $oE->setname($datos['name']);
        $oE->setApellido($datos['apellido']);
        $oE->setDirexion($datos['direxion']);
        $oE->setTelefono($datos['phone']);
        $oE->setRuc($datos['dni']);
        $oE->getOEmpresa()->setIdEmpresa($datos['id_empresa']);
        $oE->getOUser()->setUser($datos['user']);
        $oE->getOUser()->setPass($datos['pass']);
        $oE->getOPermiso()->setIdPermiso($datos['id_permiso']);

        echo json_encode(createUserEmpleado($oE));
        http_response_code(200);

        break;
    case 'PUT':
        /**UPDATE USER**/

        $datos = json_decode(file_get_contents("php://input"),true);
        $oU = new cUsuarios();
        $oU->setUser($datos["user"]);
        $oU->setPass($datos["pass"]);

        echo json_encode(updatePassUser($oU));
        http_response_code(200);

        break;
    case 'DELETE':
        break;
}

function readUsuario($id,$pass)
{
    $array = readUsuarios($id,$pass);

    if($array!=null)
    {
        return array("status"=>"ok","datos"=>$array);
    }else
        {
            return array("status"=>"vacio","datos"=>null);
        }
}


function validationUsuario($id)
{
    $cont = validarUser($id);

    if($cont==0)
    {
        return array("status"=>"disponible");
    }else
    {
        return array("status"=>"no_disponible");
    }
}

function createUserEmpleado($oE)
{
    if(insertUserEmpleado($oE))
    {
        return array("status"=>"ok");
    }
    return array("status"=>"fail");
}

function updatePassUser($oU)
{
    if(updatePass($oU))
    {
        return array("status"=>"ok");
    }
    return array("status"=>"fail");
}


?>