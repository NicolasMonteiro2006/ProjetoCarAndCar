<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Perfil extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) { return redirect()->to('/login'); }

        $usuarioModel = new UsuarioModel();
        $db = \Config\Database::connect();

        $usuario = $usuarioModel->find(session()->get('id'));

        $compras = $db->table('historico_vendas')
                      ->select('historico_vendas.*, anuncios.titulo, anuncios.foto_destaque, veiculos.modelo')
                      ->join('anuncios', 'anuncios.id = historico_vendas.anuncio_id')
                      ->join('veiculos', 'veiculos.id = anuncios.veiculo_id')
                      ->where('historico_vendas.comprador_id', session()->get('id'))
                      ->get()->getResultArray();

        $data = [
            'usuario' => $usuario,
            'compras' => $compras
        ];

        return view('perfil/index', $data);
    }

    public function salvar()
    {
        if (!session()->get('logged_in')) { return redirect()->to('/login'); }

        $model = new UsuarioModel();
        $idUser = session()->get('id');

        $dados = [
            'nome'  => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email'),
        ];

        $novaSenha = $this->request->getPost('senha');
        if (!empty($novaSenha)) {
            $dados['senha_hash'] = password_hash($novaSenha, PASSWORD_DEFAULT);
        }

        $img = $this->request->getFile('foto');
        
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $nomeFoto = $img->getRandomName();
            
            $img->move(FCPATH . 'uploads/usuarios', $nomeFoto);
            
            $dados['foto'] = $nomeFoto;
            
            session()->set('foto', $nomeFoto);
        }

        $model->update($idUser, $dados);
        
        session()->set('nome', $dados['nome']);

        return redirect()->to('/perfil')->with('msg', 'Perfil atualizado com sucesso!');
    }
}