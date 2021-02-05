<?php
class cPermisos
{
    private $id_permiso;
    private $detalle_permiso;

    /**
     * @return mixed
     */
    public function getIdPermiso()
    {
        return $this->id_permiso;
    }

    /**
     * @param mixed $id_permiso
     */
    public function setIdPermiso($id_permiso): void
    {
        $this->id_permiso = $id_permiso;
    }

    /**
     * @return mixed
     */
    public function getDetallePermiso()
    {
        return $this->detalle_permiso;
    }

    /**
     * @param mixed $detalle_permiso
     */
    public function setDetallePermiso($detalle_permiso): void
    {
        $this->detalle_permiso = $detalle_permiso;
    }


}
?>