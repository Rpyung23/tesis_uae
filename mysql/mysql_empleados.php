<?php
function updateEmpleadoBD($oE)
{
    $conn = conexion();
    $sql = "update empleado set nombres ='".$oE->getName()."'
    ,apellidos ='".$oE->getApellido()."'
    ,direccion='".$oE->getDirexion()."'
    ,telefono='".$oE->getTelefono()."' where ci = '".$oE->getRuc()."'";


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
?>
