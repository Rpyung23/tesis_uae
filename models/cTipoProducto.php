<?php
class cTipoProducto
{
    private $id_tipo_producto;
    private $nombre_tipo;

    public function __construct()
    {
    }

    public function getIdTipoProducto()
    {
        return $this->id_tipo_producto;
    }

    public function setIdTipoProducto($id_tipo_producto): void
    {
        $this->id_tipo_producto = $id_tipo_producto;
    }

    public function getNombreTipo()
    {
        return $this->nombre_tipo;
    }

    public function setNombreTipo($nombre_tipo): void
    {
        $this->nombre_tipo = $nombre_tipo;
    }

}
?>