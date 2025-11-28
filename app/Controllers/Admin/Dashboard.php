<?php 
namespace App\Controllers\Admin; 

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $nome = session()->get('nome');

        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <title>Dashboard - Loja Car And Car</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body class='p-5'>
            <div class='container'>
                <div class='alert alert-success'>
                    <h1>Painel Administrativo</h1>
                    <p>Bem-vindo, <strong>$nome</strong>!</p>
                </div>
                
                <div class='row mt-4'>
                    <div class='col-md-4'>
                        <div class='card'>
                            <div class='card-body'>
                                <h5>Gerenciar Veículos</h5>
                                <a href='" . base_url('admin/veiculos') . "' class='btn btn-primary'>Acessar</a>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class='card'>
                            <div class='card-body'>
                                <h5>Gerenciar Anúncios</h5>
                                <a href='" . base_url('admin/anuncios') . "' class='btn btn-primary'>Acessar</a>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class='card'>
                            <div class='card-body'>
                                <h5>Sair do Sistema</h5>
                                <a href='" . base_url('logout') . "' class='btn btn-danger'>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
        ";
    }
}