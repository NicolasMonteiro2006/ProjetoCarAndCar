<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnuncioModel;

class Compra extends BaseController
{
    public function confirmar($idAnuncio)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('msg', 'Faça login para comprar este veículo.');
        }

        $anuncioModel = new AnuncioModel();
        $db = \Config\Database::connect();

        $anuncio = $anuncioModel->find($idAnuncio);

        if (!$anuncio || $anuncio['status'] != 'ativo') {
            return redirect()->back()->with('erro', 'Este veículo não está mais disponível.');
        }

        $db->transStart();

        $db->table('historico_vendas')->insert([
            'anuncio_id'      => $idAnuncio,
            'comprador_id'    => session()->get('id'), 
            'cliente_nome'    => session()->get('nome'),
            'valor_negociado' => $anuncio['preco'],
            'data_venda'      => date('Y-m-d'),
            'observacoes'     => 'Compra realizada pelo site.'
        ]);

        $anuncioModel->update($idAnuncio, ['status' => 'vendido']);

        $db->transComplete();

        return redirect()->to('/perfil')->with('msg', 'Parabéns! Veículo comprado com sucesso.');
    }
}