<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AnuncioModel;
use App\Models\VeiculoModel;

class Anuncios extends BaseController
{
    public function index()
    {
        $model = new AnuncioModel();
        // Busca anúncios + dados do modelo
        $data['anuncios'] = $model->select('anuncios.*, veiculos.modelo, veiculos.marca, veiculos.versao')
                                  ->join('veiculos', 'veiculos.id = anuncios.veiculo_id')
                                  ->findAll();
        return view('admin/anuncios/index', $data);
    }

    public function novo()
    {
        $veiculoModel = new VeiculoModel();
        $data['veiculos'] = $veiculoModel->findAll();
        return view('admin/anuncios/form', $data);
    }

    public function salvar()
    {
        $model = new AnuncioModel();
        
        $img = $this->request->getFile('foto_destaque');
        $nomeFoto = null;

        if ($img && $img->isValid() && !$img->hasMoved()) {
            $nomeFoto = $img->getRandomName();
            $img->move(FCPATH . 'uploads', $nomeFoto);
        }

        $dados = [
            'veiculo_id'     => $this->request->getPost('veiculo_id'),
            'titulo'         => $this->request->getPost('titulo'),
            'descricao'      => $this->request->getPost('descricao'),
            'preco'          => $this->request->getPost('preco'),
            'placa'          => $this->request->getPost('placa'),       
            'cor'            => $this->request->getPost('cor'),         
            'ano_fabricacao' => $this->request->getPost('ano_fab'),     
            'ano_modelo'     => $this->request->getPost('ano_mod'),     
            'km_atual'       => $this->request->getPost('km_atual'),
            'status'         => 'ativo',
            'foto_destaque'  => $nomeFoto 
        ];

        $model->save($dados);
        return redirect()->to('admin/anuncios')->with('msg', 'Anúncio publicado!');
    }
}