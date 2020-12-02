<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriasModel;
use App\Models\ProductosModel;
use App\Models\UnidadesModel;

class Productos extends BaseController
{
    protected $productos;
    protected $reglas;

    public function __construct()
    {
        $this->productos = new ProductosModel();
        $this->unidades = new UnidadesModel();
        $this->categorias = new CategoriasModel();

        helper(['form']);

        $this->reglas = [
            'codigo' => [
                'rules' => 'required|is_unique[productos.codigo]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'is_unique' => 'El campo {field} debe ser unico.',
                ],
            ],
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                ],
            ],
        ];
    }

    public function index($activo = 1)
    {
        $productos = $this->productos->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Productos', 'datos' => $productos];

        echo view('header');
        echo view('nav');
        echo view('productos/productos', $data);
        echo view('footer');
    }

    public function eliminados($activo = 0)
    {
        $productos = $this->productos->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Productos eliminados', 'datos' => $productos];

        echo view('header');
        echo view('nav');
        echo view('productos/eliminados', $data);
        echo view('footer');
    }

    public function nuevo()
    {

        $unidades = $this->unidades->where('activo', 1)->findAll();
        $categorias = $this->categorias->where('activo', 1)->findAll();

        $data = ['titulo' => 'Agregar producto', 'unidades' => $unidades, 'categorias' => $categorias];

        echo view('header');
        echo view('nav');
        echo view('productos/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->productos->save([
                'codigo' => $this->request->getPost('codigo'),
                'nombre' => $this->request->getPost('nombre'),
                'precio_venta' => $this->request->getPost('precio_venta'),
                'precio_compra' => $this->request->getPost('precio_compra'),
                'stock_minimo' => $this->request->getPost('stock_minimo'),
                'inventariable' => $this->request->getPost('inventariable'),
                'id_unidad' => $this->request->getPost('id_unidad'),
                'id_categoria' => $this->request->getPost('id_categoria')]);

            $id = $this->productos->insertID();

            $validacion = $this->validate([
                'img_productos' => [
                    'uploaded[img_productos]',
                    'mime_in[img_productos,image/jpeg]',
                    'max_size[img_productos,4096]',
                ],
            ]);

            /* se puede de esta manera tambien enviar la ruta de imagen */
            //$img->move(WRITEPATH.'/uploads');

            if ($validacion) {

                $ruta_logo = "img/productos" . $id . ".jpeg";

                if (file_exists($ruta_logo)) {
                    unlink($ruta_logo);
                }

                $img = $this->request->getFile('img_productos');
                $img->move('./img/productos', $id . '.jpeg');
            } else {
                echo "error en la validacion";
                exit;
            }

            return redirect()->to(base_url() . '/productos');
        } else {

            $unidades = $this->unidades->where('activo', 1)->findAll();
            $categorias = $this->categorias->where('activo', 1)->findAll();

            $data = ['titulo' => 'Agregar producto', 'unidades' => $unidades, 'categorias' => $categorias, 'validation' => $this->validator];

            echo view('header');
            echo view('nav');
            echo view('productos/nuevo', $data);
            echo view('footer');
        }

    }

    public function editar($id)
    {

        $unidades = $this->unidades->where('activo', 1)->findAll();
        $categorias = $this->categorias->where('activo', 1)->findAll();

        $producto = $this->productos->where('id', $id)->first();

        $data = ['titulo' => 'Editar producto', 'unidades' => $unidades, 'categorias' => $categorias, 'producto' => $producto];

        echo view('header');
        echo view('nav');
        echo view('productos/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {

        $this->productos->update($this->request->getPost('id'), [
            'codigo' => $this->request->getPost('codigo'),
            'nombre' => $this->request->getPost('nombre'),
            'precio_venta' => $this->request->getPost('precio_venta'),
            'precio_compra' => $this->request->getPost('precio_compra'),
            'stock_minimo' => $this->request->getPost('stock_minimo'),
            'inventariable' => $this->request->getPost('inventariable'),
            'id_unidad' => $this->request->getPost('id_unidad'),
            'id_categoria' => $this->request->getPost('id_categoria')]);
        return redirect()->to(\base_url() . '/productos');
    }

    public function eliminar($id)
    {
        $this->productos->update($id, ['activo' => 0]);
        return redirect()->to(\base_url() . '/productos');
    }

    public function reingresar($id)
    {
        $this->productos->update($id, ['activo' => 1]);
        return redirect()->to(\base_url() . '/productos');
    }

    public function buscarPorCodigo($codigo)
    {
        $this->productos->select('*');
        $this->productos->where('codigo', $codigo);
        $this->productos->where('activo', 1);

        $datos = $this->productos->get()->getRow();

        $res['existe'] = false;
        $res['datos'] = '';
        $res['error'] = '';

        if ($datos) {
            $res['datos'] = $datos;
            $res['existe'] = true;

        } else {
            $res['error'] = 'No existe el producto';
            $res['existe'] = false;
        }

        echo json_encode($res);

    }

    public function autocompleteData()
    {
        $returnData = array();

        $valor = $this->request->getGet('term');

        $productos = $this->productos->like('codigo', $valor)->where('activo', 1)->findAll();
        if (!empty($productos)) {
            foreach ($productos as $row) {
                $data['íd'] = $row['id'];
                $data['value'] = $row['codigo'];
                $data['label'] = $row['codigo'] . '-' . $row['nombre'];
                array_push($returnData, $data);
            }
        }
        echo json_encode($returnData);
    }

    public function muestraCodigos()
    {
        echo view('header');
        echo view('nav');
        echo view('productos/ver_codigos');
        echo view('footer');
    }

    public function generar_barras()
    {

        $pdf = new \FPDF('P', 'mm', 'letter');
        $pdf->AddPage();
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetTitle("Codigo de barras");

        $productos = $this->productos->where('activo', 1)->findAll();
        foreach ($productos as $producto) {
            $codigo = $producto['codigo'];

            $generBarcode = new \barcode_genera();
            $generBarcode->barcode("img/barcode/" . $codigo . ".png", $codigo, "20", "horizontal", "code39", true);

            $pdf->Image("img/barcode/" . $codigo . ".png");
        }
        $this->response->setHeader('Content-type', 'application/pdf');
        $pdf->Output('Codigo.pdf', 'I');
    }

    public function mostrar_minimos()
    {
        echo view('header');
        echo view('nav');
        echo view('productos/ver_minimos');
        echo view('footer');
    }

    public function generar_minimos_pdf()
    {

        $pdf = new \FPDF('P', 'mm', 'letter');
        $pdf->AddPage();
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetTitle("Productos con stock minimos");
        $pdf->SetFont("ARIAL", "B", 10);

        $pdf->Image("img/logotipo.jpeg", 10, 5, 20);

        $pdf->Cell(0, 5, utf8_decode("Reporte de productos con stock minimos"), 0, 1, 'C');

        $pdf->Ln(20);

        $pdf->Cell(40, 5, utf8_decode("Codigo"), 1, 0, 'C');
        $pdf->Cell(80, 5, utf8_decode("Nombre"), 1, 0, 'C');
        $pdf->Cell(40, 5, utf8_decode("Existencias"), 1, 0, 'C');
        $pdf->Cell(35, 5, utf8_decode("Stock minimo"), 1, 1, 'C');

        $datos_productos = $this->productos->get_productos_minimo();
        foreach ($datos_productos as $producto) {
            $pdf->Cell(40, 5, $producto['codigo'], 1, 0, 'C');
            $pdf->Cell(80, 5, utf8_decode($producto['nombre']), 1, 0, 'C');
            $pdf->Cell(40, 5, $producto['existencia'], 1, 0, 'C');
            $pdf->Cell(35, 5, $producto['stock_minimo'], 1, 1, 'C');
        }

        $this->response->setHeader('Content-type', 'application/pdf');
        $pdf->Output('Productos_minimos.pdf', 'I');
    }

}
