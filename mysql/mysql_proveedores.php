<?php

function insertProveedor($oP)
{

    $conn = conexion();

    $sql = "insert into proveedores(ruc,direccion,telefono,correo,nombres) 
                   values('".$oP->getRuc()."','".$oP->getDirexion()."','".$oP->getTelefono()."'
                   ,'".$oP->getEmail()."','".$oP->getName()."')";

    mysqli_begin_transaction($conn,MYSQLI_TRANS_START_READ_WRITE);
    try
    {
        if(mysqli_query($conn,$sql))
        {
            mysqli_commit($conn);
            return true;
        }else
        {
            mysqli_commit($conn);
            return false;
        }
    }catch(Exception $e)
    {
        mysqli_rollback($conn);
        return false;
    }
}

function validationProveedor($ruc)
{

    $conn = conexion();

    $sql =  "select count(P.ruc) as contador from proveedores as P where ruc='".$ruc."'";

    $query = mysqli_query($conn,$sql);
    $contador = 0;

    if(mysqli_num_rows($query)>0)
    {
        while($lector = mysqli_fetch_array($query))
        {
            $contador = $lector['contador'];
        }
        return $contador;
    }else
    {
        return $contador;
    }
}

function updateProveedor($oP)
{
    $conn = conexion();

    $sql = "update proveedores set direccion = '".$oP->getDirexion()."'
    ,telefono='".$oP->getTelefono()."',correo='".$oP->getEmail()."'
    ,nombres='".$oP->getName()."' where ruc = '".$oP->getRuc()."'";

    mysqli_begin_transaction($conn,MYSQLI_TRANS_START_READ_WRITE);
    try
    {
        if(mysqli_query($conn,$sql))
        {
            mysqli_commit($conn);
            return true;
        }else
            {
                mysqli_commit($conn);
                return false;
            }
    }catch(Exception $e)
    {
        mysqli_rollback($conn);
    }

    return false;
}

function allProveedores()
{
    $oPList = null;
    $cont = 0;

    $conn = conexion();

    $sql = "select * from proveedores";

    mysqli_begin_transaction($conn,MYSQLI_TRANS_START_READ_WRITE);
    try
    {
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query)>0)
        {
            mysqli_commit($conn);

            while($lector = mysqli_fetch_array($query))
            {

                $oP = new cProveedores();

                $oP->setRuc($lector["ruc"]);
                $oP->setDirexion($lector["direccion"]);
                $oP->setTelefono($lector["telefono"]);
                $oP->setEmail($lector["correo"]);
                $oP->setName($lector["nombres"]);
                $oPList[$cont] = $oP;

                $cont++;
            }

            return $oPList;

        }else
            {
                mysqli_commit($conn);
                return  null;
            }
    }catch (Exception $e)
    {
        mysqli_rollback($conn);
    }

    return null;
}

function oneProveedor($ruc)
{

    $oP = new cProveedores();
    $conn = conexion();

    $sql = "select * from proveedores where ruc = '".$ruc."'";

    mysqli_begin_transaction($conn,MYSQLI_TRANS_START_READ_WRITE);
    try
    {
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query)>0)
        {
            mysqli_commit($conn);

            while($lector = mysqli_fetch_array($query))
            {

                $oP->setRuc($lector["ruc"]);
                $oP->setDirexion($lector["direccion"]);
                $oP->setTelefono($lector["telefono"]);
                $oP->setEmail($lector["correo"]);
                $oP->setName($lector["nombres"]);
            }

            return $oP;

        }else
        {
            mysqli_commit($conn);
            return  null;
        }
    }catch (Exception $e)
    {
        mysqli_rollback($conn);
    }

    return null;
}


?>
