<?php


class cCategoria
{
    private $id_categoria;
    private $detalle;
    private $porc_ganacia;

    /**
     * cCategoria constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->id_categoria;
    }

    /**
     * @param mixed $id_categoria
     */
    public function setIdCategoria($id_categoria): void
    {
        $this->id_categoria = $id_categoria;
    }

    /**
     * @return mixed
     */
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * @param mixed $detalle
     */
    public function setDetalle($detalle): void
    {
        $this->detalle = $detalle;
    }

    /**
     * @return mixed
     */
    public function getPorcGanacia()
    {
        return $this->porc_ganacia;
    }

    /**
     * @param mixed $porc_ganacia
     */
    public function setPorcGanacia($porc_ganacia): void
    {
        $this->porc_ganacia = $porc_ganacia;
    }



}
?>