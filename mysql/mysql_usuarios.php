<?php

function readUsuarios($id,$pass)
{
    $sql = "select E.ci,E.nombres,E.apellidos,U.usuario from pinturas_villavicencio.empleado
    as E join pinturas_villavicencio.usuarios as U
      on E.ci=U.fk_id_empleadp and E.ci = '".$id."'and U.contrasena='".$pass."'";

    $oE = new cEmpleado();
    $result =  mysqli_query(conexion(),$sql);

    if(mysqli_num_rows($result)>0)
    {
        /****/
        while( $lector = mysqli_fetch_array($result))
        {
            $oE->setName($lector["nombres"]);
            $oE->setApellido($lector["apellidos"]);
            $oE->getOUser()->setUser($lector["usuario"]);
            $oE->setRuc($lector["ci"]);
        }
        return array("nombre"=>$oE->getName(),"apellido"=>$oE->getApellido(),
            "usuario"=>$oE->getOUser()->getUser()
        ,"ci"=>$oE->getRuc());

    }else
        {
            return null;
        }
}

function validarUser($user)
{
    $sql =  "select count(U.usuario) as contador from usuarios as U where usuario='".$user."'";

    $query = mysqli_query(conexion(),$sql);
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

function insertUserEmpleado($oEmpleado)
{
    $sql_empleado = "insert into empleado(ci, fk_id_empresa, nombres, apellidos, direccion, telefono)
                     values('".$oEmpleado->getruc()."',".$oEmpleado->getOEmpresa()->getIdEmpresa()."
                     ,'".$oEmpleado->getname()."','".$oEmpleado->getApellido()."'
                     ,'".$oEmpleado->getDirexion()."','".$oEmpleado->getTelefono()."')";

    $sql_user = "insert into usuarios(usuario, fk_id_empleadp, contrasena, fk_id_permiso) 
                 values('".$oEmpleado->getOUser()->getUser()."'
                 ,'".$oEmpleado->getruc()."'
                 ,'".$oEmpleado->getOUser()->getPass()."'
                 ,".$oEmpleado->getOPermiso()->getIdPermiso().")";

    $conn = conexion();
    mysqli_begin_transaction($conn,MYSQLI_TRANS_START_READ_WRITE);
    try
    {
        mysqli_query($conn,$sql_empleado);
        mysqli_query($conn,$sql_user);
        mysqli_commit($conn);
        return true;

    }catch(Exception $e)
    {
        mysqli_rollback($conn);
        return false;
    }
}

/**update User**/
function updatePass($oUser)
{
    $conn = conexion();

    $sql = "update usuarios as U set U.contrasena = '".$oUser->getPass()."' 
    where U.usuario = '".$oUser->getUser()."'";

    //echo $sql;

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
    }catch (Exception $ee)
    {
        mysqli_rollback($conn);
        return false;
    }

}
?>
