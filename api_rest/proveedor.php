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

if(file_exists('models/cProveedores.php'))
{
    include('models/cProveedores.php');
}else
{
    include('../models/cProveedores.php');
}

if(file_exists('models/mysql_proveedores.php'))
{
    include('mysql/mysql_proveedores.php');
}else
{
    include('../mysql/mysql_proveedores.php');
}

switch($_SERVER['REQUEST_METHOD'])
{
    case 'GET':

        if($_SERVER['REQUEST_URI'] == '/tesis_uae/api_rest/proveedor.php/all_proveedores')
        {
            /**todos los proveedores**/

            echo json_encode(listaProveedores());
            http_response_code(200);

        }else
            {
                /**solo un proveedor**/
                $datos = json_decode(file_get_contents("php://input"),true);
                echo json_encode(especificoProveedor($datos['ruc']));
                http_response_code(200);
            }

        break;

    case 'POST':

        $datos = json_decode(file_get_contents("php://input"),true);
        $oP = new cProveedores();
        $oP->setRuc($datos["ruc"]);
        $oP->setDirexion($datos["dir"]);
        $oP->setTelefono($datos["phone"]);
        $oP->setEmail($datos["email"]);
        $oP->setName($datos["name"]);

        echo json_encode(createNewProveedor($oP));
        http_response_code(200);

        break;

    case 'PUT':

        $datos = json_decode(file_get_contents("php://input"),true);
        $oP = new cProveedores();
        $oP->setRuc($datos["ruc"]);
        $oP->setDirexion($datos["dir"]);
        $oP->setTelefono($datos["phone"]);
        $oP->setEmail($datos["email"]);
        $oP->setName($datos["name"]);

        echo json_encode(updateProveedorRuc($oP));
        http_response_code(200);
        break;
}

function updateProveedorRuc($oP)
{
    if(updateProveedor($oP))
    {
        return array("status"=>"update");
    }
    return array("status"=>"no_update");
}

function createNewProveedor($oP)
{
    if(validationProveedor($oP->getRuc())==0)
    {
       if(insertProveedor($oP))
       {
          return array("status"=>"ok");
       }
       return array("status"=>"no_create");
    }else
        {
            return array("status"=>"ruc_no_disponible");
        }
}

function listaProveedores()
{
    $datos = allProveedores();
    $array = null;

    if($datos!=null)
    {
        for($i = 0; $i < sizeof($datos,0); $i++)
        {
            $array[$i] = array("ruc"=>$datos[$i]->getRuc()
        ,"dir"=>$datos[$i]->getDirexion(),"phone"=>$datos[$i]->getTelefono()
        ,"email"=>$datos[$i]->getEmail(),"names"=>$datos[$i]->getName());
        }

        return array("status"=>"ok","datos"=>$array);
    }
    return array("status"=>"vacio","datos"=>null);
}

function especificoProveedor($ruc)
{
    $datos = oneProveedor($ruc);
    $array = null;

    if($datos!=null)
    {

        return array("status"=>"ok","datos"=>array("ruc"=>$datos->getRuc()
        ,"dir"=>$datos->getDirexion(),"phone"=>$datos->getTelefono()
        ,"email"=>$datos->getEmail(),"names"=>$datos->getName()));
    }
    return array("status"=>"vacio","datos"=>null);
}

?>