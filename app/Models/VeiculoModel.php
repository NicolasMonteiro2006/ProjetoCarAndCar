<?php namespace App\Models;

use CodeIgniter\Model;

class VeiculoModel extends Model
{
    protected $table = 'veiculos';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'placa', 
        'marca', 
        'modelo', 
        'versao', 
        'ano_fabricacao', 
        'ano_modelo', 
        'cor', 
        'combustivel'
    ];
    
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; 
}