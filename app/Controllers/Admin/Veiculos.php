<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VeiculoModel;
use App\Models\AnuncioModel;

class Veiculos extends BaseController
{
    public function index()
    {
        $model = new VeiculoModel();
        $data = ['veiculos' => $model->findAll()];
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
            'marca'          => $this->request->getPost('marca'),
            'modelo'         => $this->request->getPost('modelo'),
            'versao'         => $this->request->getPost('versao'),
            'combustivel'    => $this->request->getPost('combustivel'),
        ];
        $model->save($dados);
        return redirect()->to('admin/veiculos');
    }
    public function excluir($id)
    {
        $veiculoModel = new VeiculoModel();
        $anuncioModel = new AnuncioModel();
        $db = \Config\Database::connect();

        $anuncios = $anuncioModel->where('veiculo_id', $id)->findColumn('id');

        if (!empty($anuncios)) {
            $db->table('historico_vendas')->whereIn('anuncio_id', $anuncios)->delete();

            $anuncioModel->whereIn('id', $anuncios)->delete();
        }

        $veiculoModel->delete($id);

        return redirect()->to('admin/veiculos');
    }
}