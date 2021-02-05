<?php
if(file_exists("models/cTipoProducto.php"))
{
    require_once("models/cTipoProducto.php");
}else
    {
        require_once("../models/cTipoProducto.php");
    }

if(file_exists("models/cCategoria.php"))
{
    require_once("models/cCategoria.php");
}else
{
    require_once("../models/cCategoria.php");
    }

if(file_exists("models/cUnidad.php"))
{
    require_once("models/cUnidad.php");
}else
{
    require_once("../models/cUnidad.php");
}

class cProducto
{
    private $oTipoProducto;
    private $oCategoria;
    private $oUnidadList;

    private $id_producto;

    private $name_producto;
    private $precio;
    private $stock;
    private $pvp;

    public function __construct()
    {
        $this->oTipoProducto = new cTipoProducto();
        $this->oCategoria = new cCategoria();
        $this->oUnidadList[0] = new cUnidad();
    }

    public function getOUnidadList(): cUnidad
    {
        return $this->oUnidad;
    }

    public function setOUnidadList(cUnidad $oUnidad): void
    {
        $this->oUnidad = $oUnidad;
    }

    public function getOTipoProducto(): cTipoProducto
    {
        return $this->oTipoProducto;
    }

    public function setOTipoProducto(cTipoProducto $oTipoProducto): void
    {
        $this->oTipoProducto = $oTipoProducto;
    }

    /**
     * @return cCategoria
     */
    public function getOCategoria(): cCategoria
    {
        return $this->oCategoria;
    }

    /**
     * @param cCategoria $oCategoria
     */
    public function setOCategoria(cCategoria $oCategoria): void
    {
        $this->oCategoria = $oCategoria;
    }

    /**
     * @return mixed
     */
    public function getIdProducto()
    {
        return $this->id_producto;
    }

    /**
     * @param mixed $id_producto
     */
    public function setIdProducto($id_producto): void
    {
        $this->id_producto = $id_producto;
    }

    /**
     * @return mixed
     */
    public function getNameProducto()
    {
        return $this->name_producto;
    }

    /**
     * @param mixed $name_producto
     */
    public function setNameProducto($name_producto): void
    {
        $this->name_producto = $name_producto;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio): void
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock): void
    {
        $this->stock = $stock;
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