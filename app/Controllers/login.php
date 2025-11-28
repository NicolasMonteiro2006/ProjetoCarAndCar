<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Login extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }
        
        return view('admin/login');
    }

    public function autenticar()
    {
        $session = session();
        $model = new UsuarioModel();
        
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');
        
        $data = $model->where('email', $email)->first();
        
        if ($data) {
            $pass = $data['senha_hash'];
            
            if (password_verify($senha, $pass)) {
                
                $ses_data = [
                    'id'        => $data['id'],
                    'nome'      => $data['nome'],
                    'email'     => $data['email'],
                    'tipo'      => $data['tipo'],
                    'foto'      => $data['foto'], 
                    'logged_in' => TRUE
                ];
                
                $session->set($ses_data);
                
                return redirect()->to('/');
                
            } else {
                $session->setFlashdata('msg', 'Senha incorreta.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'E-mail não encontrado.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
    
    public function consertarSenha()
    {
        $model = new UsuarioModel();
        $senhaCorreta = password_hash('123456', PASSWORD_DEFAULT);
        
        $model->where('email', 'admin@lojascarandcar.com.br')
              ->set(['senha_hash' => $senhaCorreta, 'tipo' => 'admin'])
              ->update();
              
        echo "Senha resetada para 123456 e Tipo definido como ADMIN. <a href='".base_url('login')."'>Logar</a>";
    }
}