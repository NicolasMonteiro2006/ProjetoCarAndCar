<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Usuarios extends BaseController
{
    public function index()
    {
        $model = new UsuarioModel();
        $data['usuarios'] = $model->where('id !=', session()->get('id'))->findAll();
        
        return view('admin/usuarios/index', $data);
    }

    public function tornarAdmin($id)
    {
        $model = new UsuarioModel();
        $model->update($id, ['tipo' => 'admin']);
        return redirect()->to('admin/usuarios')->with('msg', 'Usuário promovido a ADMIN com sucesso!');
    }

    public function removerAdmin($id)
    {
        $model = new UsuarioModel();
        $model->update($id, ['tipo' => 'usuario']);
        return redirect()->to('admin/usuarios')->with('msg', 'Privilégio de Admin removido.');
    }
}