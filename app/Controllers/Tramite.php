<?php

namespace App\Controllers;

use App\Models\TramiteModel;

class Tramite extends BaseController
{
    public function index()
    {
        $tramiteModel = new TramiteModel();
        $usuario      = session()->get('usuario');

        if ($usuario['rol'] === 'ciudadano') {
            // Solo trámites del usuario logueado
            $tramites = $tramiteModel
                ->where('usuario_id', $usuario['id'])
                ->findAll();
        } else {
            // Todos los trámites para funcionarios
            $tramites = $tramiteModel->findAll();
        }

        return view('tramite/index', [
            'tramites' => $tramites,
            'usuario'  => $usuario
        ]);
    }

    public function create()
    {
        return view('tramite/create');
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'titulo' => 'required|min_length[3]|max_length[100]',
            'descripcion' => 'required|min_length[3]|max_length[500]'
        ];

        if ($this->validate($rules)) {
            $tramiteModel = new TramiteModel();
            $usuario = session()->get('usuario');
            $data = [
                'usuario_id' => $usuario['id'],
                'titulo'     => $this->request->getVar('titulo'),
                'descripcion'=> $this->request->getVar('descripcion')
            ];
            $tramiteModel->save($data);
            return redirect()->to('/tramites')->with('success', 'Trámite creado correctamente');
        } else {
            return view('tramite/create', ['validation' => $this->validator]);
        }
    }

    public function update($id)
    {
        $tramiteModel = new TramiteModel();
        $tramiteModel->update($id, [
            'estado' => $this->request->getPost('estado')
        ]);
        return redirect()->to('/tramites')->with('success', 'Estado actualizado');
    }
}