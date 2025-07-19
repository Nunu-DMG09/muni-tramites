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

    public function delete($id)
    {
        $usuario = session()->get('usuario');

        // Solo funcionarios pueden eliminar
        if ($usuario['rol'] !== 'funcionario') {
            return redirect()->to('/tramites')->with('error', 'No tienes permisos para eliminar trámites.');
        }

        $tramiteModel = new \App\Models\TramiteModel();
        $tramite = $tramiteModel->find($id);

        if ($tramite) {
            $tramiteModel->delete($id);
            return redirect()->to('/tramites')->with('success', 'Trámite eliminado correctamente.');
        } else {
            return redirect()->to('/tramites')->with('error', 'El trámite no existe.');
        }
    }

    public function edit($id)
    {
        $tramiteModel = new \App\Models\TramiteModel();
        $tramite = $tramiteModel->find($id);

        if (!$tramite) {
            return redirect()->to('/tramites')->with('error', 'Trámite no encontrado.');
        }

        return view('tramite/edit', ['tramite' => $tramite]);
    }
}