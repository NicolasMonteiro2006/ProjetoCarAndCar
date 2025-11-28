<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Cadastro extends BaseController
{
    public function index()
    {
        return view('cadastro');
    }

    public function salvar()
    {
        $model = new UsuarioModel();

        $img = $this->request->getFile('foto');
        $nomeFoto = null;

        if ($img && $img->isValid() && !$img->hasMoved()) {
            $nomeFoto = $img->getRandomName();
            $img->move('uploads/usuarios', $nomeFoto);
        }

        $dados = [
            'nome'       => $this->request->getPost('nome'),
            'email'      => $this->request->getPost('email'),
            'senha_hash' => password_hash($this->request->getPost('senha'), PASSWORD_DEFAULT),
            'foto'       => $nomeFoto,
            'tipo'       => 'usuario' 
        ];

        if ($model->save($dados)) {
            return redirect()->to('/login')->with('msg', 'Cadastro realizado! Faça login.');
        } else {
            return redirect()->to('/cadastro')->with('erro', 'Falha ao cadastrar.');
        }
    }
}