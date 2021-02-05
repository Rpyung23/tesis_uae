<?php
class cUnidad
{
    private $id_unidad;
    private $detalle;

    public function __construct()
    {
    }

    public function getIdUnidad()
    {
        return $this->id_unidad;
    }

    public function setIdUnidad($id_unidad): void
    {
        $this->id_unidad = $id_unidad;
    }

    public function getDetalle()
    {
        return $this->detalle;
    }

    public function setDetalle($detalle): void
    {
        $this->detalle = $detalle;
    }


}
?>