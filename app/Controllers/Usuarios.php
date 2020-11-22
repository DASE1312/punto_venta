<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CajasModel;
use App\Models\RolesModel;
use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    protected $usuarios, $cajas, $roles;
    protected $reglas;

    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
        $this->cajas = new CajasModel();
        $this->roles = new RolesModel();

        helper(['form']);

        $this->reglas = [
            'usuario' => [
                'rules' => 'required|is_unique[usuarios.usuario]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'is_unique' => 'El campo {field} es obligatorio.',
                ],
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                ],
            ],
            'repassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'matches' => 'El passwords no coincide.',
                ],
            ],
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                ],
            ],
            'id_caja' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                ],
            ],
            'id_rol' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                ],
            ],
        ];
    }

    public function index($activo = 1)
    {
        $usuarios = $this->usuarios->where('activo', $activo)->findAll();
        $cajas = $this->cajas->where('activo', 1)->findAll();
        $roles = $this->roles->where('activo', 1)->findAll();

        $data = ['titulo' => 'Usuarios', 'datos' => $usuarios/*'datos'=>$cajas,'datos'=>$roles*/];

        echo view('header');
        echo view('nav');
        echo view('usuarios/usuarios', $data);
        echo view('footer');
    }

    public function eliminados($activo = 0)
    {
        $usuarios = $this->usuarios->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Usuarios eliminadas', 'datos' => $usuarios];

        echo view('header');
        echo view('nav');
        echo view('usuarios/eliminados', $data);
        echo view('footer');
    }

    public function nuevo()
    {

        $cajas = $this->cajas->where('activo', 1)->findAll();
        $roles = $this->roles->where('activo', 1)->findAll();

        $data = ['titulo' => 'Agregar usuario', 'cajas' => $cajas, 'roles' => $roles];

        echo view('header');
        echo view('nav');
        echo view('usuarios/nuevo', $data);
        echo view('footer');
    }

    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {

            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $this->usuarios->save([

                'usuario' => $this->request->getPost('usuario'),
                'password' => $hash,
                'nombre' => $this->request->getPost('nombre'),
                'id_caja' => $this->request->getPost('id_caja'),
                'id_rol' => $this->request->getPost('id_rol')]);

            return redirect()->to(base_url() . '/usuarios');

        } else {

            $cajas = $this->cajas->where('activo', 1)->findAll();
            $roles = $this->roles->where('activo', 1)->findAll();

            $data = ['titulo' => 'Agregar usuario', 'cajas' => $cajas, 'roles' => $roles, 'validation' => $this->validator];

            echo view('header');
            echo view('nav');
            echo view('usuarios/nuevo', $data);
            echo view('footer');
        }

    }

    public function editar($id, $valid = null)
    {

        $unidad = $this->usuarios->where('id', $id)->first();

        if ($valid != null) {
            $data = ['titulo' => 'Editar unidad', 'datos' => $unidad, 'validation' => $valid];
        } else {
            $data = ['titulo' => 'Editar unidad', 'datos' => $unidad];
        }

        echo view('header');
        echo view('nav');
        echo view('usuarios/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {
            $this->usuarios->update($this->request->getPost('id'), [
                'nombre' => $this->request->getPost('nombre'),
                'nombre_corto' => $this->request->getPost('nombre_corto')]);
            return redirect()->to(base_url() . '/usuarios');
        } else {
            return $this->editar($this->request->getPost('id'), $this->validator);
        }
    }

    public function eliminar($id)
    {
        $this->usuarios->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/usuarios');
    }

    public function reingresar($id)
    {
        $this->usuarios->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/usuarios');
    }

    function login(){
        echo view ('login');
    }

}
