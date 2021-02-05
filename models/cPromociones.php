<?php

if(file_exists("models/cProducto.php"))
{
    require_once("models/cProducto.php");
}else
{
    require_once("../models/cProducto.php");
}

class cPromociones
{
    private $oProductoList;
    private $id_promocion;
    private $descripcion;
    private $pvp;

    public function __construct()
    {
        $this->oProductoList[0] = new cProducto();
    }

    /**
     * @return mixed
     */
    public function getOProductoList()
    {
        return $this->oProductoList;
    }

    /**
     * @param mixed $oProductoList
     */
    public function setOProductoList($oProductoList): void
    {
        $this->oProductoList = $oProductoList;
    }

    /**
     * @return mixed
     */
    public function getIdPromocion()
    {
        return $this->id_promocion;
    }

    /**
     * @param mixed $id_promocion
     */
    public function setIdPromocion($id_promocion): void
    {
        $this->id_promocion = $id_promocion;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getPvp()
    {
        return $this->pvp;
    }

    /**
     * @param mixed $pvp
     */
    public function setPvp($pvp): void
    {
        $this->pvp = $pvp;
    }


}

?>