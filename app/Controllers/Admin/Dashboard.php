<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        // Esta linha é a mágica. Ela manda carregar o arquivo
        // app/Views/admin/dashboard.php
        return view('admin/dashboard');
    }
}