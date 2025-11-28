<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Loja Car And Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #212529; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            height: 100vh; 
        }
        .login-card { width: 100%; max-width: 400px; padding: 30px; border-radius: 10px; }
        .brand-title { color: #dc3545; font-weight: bold; text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>

    <div class="card login-card shadow">
        <div class="card-body">
            <h2 class="brand-title">CAR AND CAR</h2>
            <h5 class="text-center text-muted mb-4">Acesso ao Sistema</h5>
            
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-danger text-center"><?= session()->getFlashdata('msg') ?></div>
            <?php endif;?>

            <form action="<?= base_url('login/autenticar') ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Usuário</label>
                    <input type="email" name="email" class="form-control" required placeholder="Usuário">
                </div>
                <div class="mb-4">
                    <label class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" required placeholder="Senha">
                </div>
                <button type="submit" class="btn btn-danger w-100 py-2">ENTRAR</button>
            </form>
            
            <div class="text-center mt-3">
                <small class="text-muted">Acesso restrito a funcionários</small>
            </div>
        </div>
    </div>

</body>
</html>