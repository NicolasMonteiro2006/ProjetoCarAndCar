<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VeiculoModel;


class Veiculos extends BaseController
{
    public function index()
    {
        $model = new VeiculoModel();
        
        $data = [
            'veiculos' => $model->findAll()
        ];

        return view('admin/veiculos/index', $data);
    }

    public function novo()
    {
        return view('admin/veiculos/form');
    }

    public function salvar()
    {
        $model = new VeiculoModel();
        
        $dados = [
            'placa'          => $this->request->getPost('placa'),
            'marca'          => $this->request->getPost('marca'),
            'modelo'         => $this->request->getPost('modelo'),
            'ano_fabricacao' => $this->request->getPost('ano_fabricacao'),
            'ano_modelo'     => $this->request->getPost('ano_modelo'),
            'cor'            => $this->request->getPost('cor'),
            'combustivel'    => $this->request->getPost('combustivel'),
        ];

        $model->save($dados);

        return redirect()->to('admin/veiculos');
    }

    public function excluir($id)
    {
        $model = new VeiculoModel();
        $model->delete($id);
        return redirect()->to('admin/veiculos');
    }
}