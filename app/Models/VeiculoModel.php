<?php namespace App\Models;

use CodeIgniter\Model;

class VeiculoModel extends Model
{
    protected $table = 'veiculos';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['marca', 'modelo', 'versao', 'combustivel'];
    
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at'; 
}