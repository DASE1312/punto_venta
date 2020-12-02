<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CajasModel;
use App\Models\RolesModel;
use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    protected $usuarios, $cajas, $roles;
    protected $reglas, $reglasLogin, $reglasActualizar;

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
                    'is_unique' => 'El usuario {field} ya existe.',
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

        $this->reglasLogin = [
            'usuario' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                ],
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                ],
            ],
        ];

        $this->reglasActualizar = [
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

    public function editar($id)
    {

        $cajas = $this->cajas->where('activo', 1)->findAll();
        $roles = $this->roles->where('activo', 1)->findAll();

        $usuarios = $this->usuarios->where('id', $id)->first();

        $data = ['titulo' => 'Editar producto', 'usuarios' => $usuarios, 'cajas' => $cajas, 'roles' => $roles];

        echo view('header');
        echo view('nav');
        echo view('usuarios/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {
        
        $this->usuarios->update($this->request->getPost('id'), [
            'usuario' => $this->request->getPost('usuario'),
            'nombre' => $this->request->getPost('nombre'),
            'id_caja' => $this->request->getPost('id_caja'),
            'id_rol' => $this->request->getPost('id_rol'),]);

            return redirect()->to(base_url() . '/usuarios');
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

    public function login()
    {
        echo view('login');
    }

    public function valida()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglasLogin)) {

            $usuario = $this->request->getPost('usuario');
            $password = $this->request->getPost('password');

            $datosUsuario = $this->usuarios->where('usuario', $usuario)->first();

            if ($datosUsuario != null) {
                if (password_verify($password, $datosUsuario['password'])) {
                    $datosSesion = [
                        'id_usuario' => $datosUsuario['id'],
                        'nombre' => $datosUsuario['nombre'],
                        'id_caja' => $datosUsuario['id_caja'],
                        'id_rol' => $datosUsuario['id_rol'],
                    ];

                    $session = session();
                    $session->set($datosSesion);

                    return redirect()->to(base_url() . '/inicio');
                } else {
                    $data['error'] = "El usuario o la contraseña no coincide";
                    echo view('login', $data);
                }
            } else {
                $data['error'] = "El usuario no existe";
                echo view('login', $data);
            }
        } else {
            $data = ['validation' => $this->validator];
            echo view('login', $data);
        }
    }

    public function logout()
    {

        $session = session();
        $session->destroy();

        return redirect()->to(base_url());
    }

    public function cambio_password()
    {

        $session = session();
        $usuarios = $this->usuarios->where('id', $session->id_usuario)->first();

        $data = ['titulo' => 'Cambiar contraseña', 'usuario' => $usuarios];

        echo view('header');
        echo view('nav');
        echo view('usuarios/cambio_pass', $data);
        echo view('footer');
    }

    public function actualizar_password()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglasActualizar)) {

            $session = session();
            $idUsuario = $session->id_usuario;

            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $this->usuarios->update($idUsuario, ['password' => $hash]);

            $usuarios = $this->usuarios->where('id', $session->id_usuario)->first();

            $data = ['titulo' => 'Cambiar contraseña', 'usuario' => $usuarios, 'mensaje' => 'Contraseña actualizada'];

            echo view('header');
            echo view('nav');
            echo view('usuarios/cambio_pass', $data);
            echo view('footer');

        } else {

            $session = session();
            $usuarios = $this->usuarios->where('id', $session->id_usuario)->first();

            $data = ['titulo' => 'Cambiar contraseña', 'usuario' => $usuarios,'validation'=> $this->validator];

            echo view('header');
            echo view('nav');
            echo view('usuarios/cambio_pass', $data);
            echo view('footer');
        }
    }
}
