<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AnuncioModel;
use App\Models\VeiculoModel;

class Anuncios extends BaseController
{
    public function index()
    {
        $model = new AnuncioModel();
        $data['anuncios'] = $model->getAnunciosCompletos(); 

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
        
        // Upload de Imagem
        $img = $this->request->getFile('foto');
        $nomeFoto = null;

        if ($img->isValid() && ! $img->hasMoved()) {
            $nomeFoto = $img->getRandomName(); 
            $img->move('uploads', $nomeFoto); 
        }

        $dados = [
            'veiculo_id' => $this->request->getPost('veiculo_id'),
            'titulo'     => $this->request->getPost('titulo'),
            'descricao'  => $this->request->getPost('descricao'),
            'preco'      => $this->request->getPost('preco'),
            'km_atual'   => $this->request->getPost('km_atual'),
            'foto_destaque' => $nomeFoto,
            'status'     => 'ativo'
        ];

        $model->save($dados);
        return redirect()->to('admin/anuncios');
    }
}