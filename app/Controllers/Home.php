<?php namespace App\Controllers;

use App\Models\AnuncioModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new AnuncioModel();
        
        $data = [
            'anuncios' => $model->getAnunciosCompletos()
        ];

        return view('home', $data);
    }

    public function detalhes($id)
    {
        $model = new AnuncioModel();
        
        $anuncio = $model->select('anuncios.*, veiculos.marca, veiculos.modelo, veiculos.versao, veiculos.combustivel')
                         ->join('veiculos', 'veiculos.id = anuncios.veiculo_id')
                         ->where('anuncios.id', $id)
                         ->first();

        if (!$anuncio) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Anúncio não encontrado.");
        }

        return view('detalhes', ['anuncio' => $anuncio]);
    }

    public function atualizarBanco()
    {
        echo "Banco já atualizado.";
    }
}