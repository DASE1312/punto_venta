<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['codigo', 'nombre', 'precio_venta', 'precio_compra', 'existencia', 'stock_minimo', 'inventariable', 'id_unidad', 'id_categoria', 'activo'];

    protected $useTimestamps = true;
    protected $createdField = 'fecha_alta';
    protected $updatedField = '';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function actualizarStock($id_producto, $cantidad, $operador = '+')
    {
        $this->set('existencia', "existencia $operador $cantidad", false);

        $this->where('id', $id_producto);

        $this->update();
    }

    public function totalProductos()
    {
        return $this->where('activo', 1)->countAllResults();
    }

    public function productos_minimo()
    {
        $where = ("stock_minimo >= existencia AND inventariable = 1 AND activo");
        $this->where($where);
        $sql = $this->countAllResults();

        return $sql;
    }

    public function get_productos_minimo()
    {
        $where = ("stock_minimo >= existencia AND inventariable = 1 AND activo");
        return $this->where($where)->findAll();
    }
}
