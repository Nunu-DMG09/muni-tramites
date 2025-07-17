<?php 

namespace App\Controllers;

use App\Models\UsuarioModel;

class Auth extends BaseController
{
    public function register(){
        return view('auth/register');
    }

    public function saveRegister(){
        helper(['form']);
        $rules = [
            'nombre' => 'required|min_Length[3]|max_length[50]',
            'email' => 'required|valid_email|is_unique[usuarios.email]',
            'password' => 'required|min_length[3]|max_length[15]',
            'confirmar' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $usuarioModel = new UsuarioModel();
            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'rol' => 'ciudadano' 
            ];
            $usuarioModel->save($data);
            return redirect()->to('login')->with('success', 'Usuario registrado correctamente');
        } else {
            return view('auth/register', ['validation' => $this->validator]);
        }
    }


    public function login(){
        return view('auth/login');
    }

    public function doLogin(){
        $usuarioModel = new UsuarioModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $usuarioModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
           session()->set('usuario', $user);
           return redirect()->to('/tramites');
        } else {
            return redirect()->to('/login')->with('error', 'Credenciales incorrectas');
        }
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Sesión cerrada correctamente');
    }
}