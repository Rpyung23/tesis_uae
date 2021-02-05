<?php

function conexion()
{
    $conn =  mysqli_connect("localhost","root","","pinturas_villavicencio",3306);

    if (mysqli_error($conn))
    {
        return null;
    }
    return $conn;
}

?>
