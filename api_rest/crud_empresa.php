<?php
switch($_SERVER['REQUEST_METHOD'])
{
    case 'GET':

        break;
    case 'POST':
        echo "GET POST";
        break;
    case 'PUT':
        echo "GET PUT";
        break;
    case 'DELETE':
        echo "GET DELETE";
        break;
}

?>

