<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RolesModel;

class Roles extends BaseController
{
    protected $roles;
    protected $reglas;

    public function __construct()
    {
        $this->roles = new RolesModel();
        helper(['form']);

        $this->reglas = [
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
        $roles = $this->roles->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Roles', 'datos' => $roles];

        echo view('header');
        echo view('nav');
        echo view('roles/roles', $data);
        echo view('footer');
    }

    public function eliminados($activo = 0)
    {
        $roles = $this->roles->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Roles eliminadas', 'datos' => $roles];

        echo view('header');
        echo view('nav');
        echo view('roles/eliminados', $data);
        echo view('footer');
    }

    public function nuevo()
    {
        $data = ['titulo' => 'Agregar roles'];

        echo view('header');
        echo view('nav');
        echo view('roles/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->roles->save([
                'nombre' => $this->request->getPost('nombre'),
            ]);
            return redirect()->to(base_url() . '/roles');
        } else {

            $data = ['titulo' => 'Agregar roles', 'validation' => $this->validator];

            echo view('header');
            echo view('nav');
            echo view('roles/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id)
    {

        $roles = $this->roles->where('id', $id)->first();

        $data = ['titulo' => 'Editar roles', 'roles' => $roles];

        echo view('header');
        echo view('nav');
        echo view('roles/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->roles->update($this->request->getPost('id'), [
                'nombre' => $this->request->getPost('nombre'),
            ]);
            return redirect()->to(\base_url() . '/roles');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {
        $this->roles->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/roles');
    }

    public function reingresar($id)
    {
        $this->roles->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/roles');
    }
}
