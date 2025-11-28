<?php namespace App\Models;

use CodeIgniter\Model;

class AnuncioModel extends Model
{
    protected $table = 'anuncios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['veiculo_id', 'titulo', 'descricao', 'preco', 'km_atual', 'foto_destaque', 'status'];
    protected $useTimestamps = true;

    public function getAnunciosCompletos() {
        return $this->select('anuncios.*, veiculos.marca, veiculos.modelo, veiculos.ano_modelo, veiculos.ano_fabricacao, veiculos.combustivel, veiculos.placa')
                    ->join('veiculos', 'veiculos.id = anuncios.veiculo_id')
                    ->where('anuncios.status', 'ativo')
                    ->findAll();
    }
}