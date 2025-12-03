<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Car And Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-image: url('<?= base_url("assets/img/fundo-login.jpg") ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #212529;
            padding: 20px 0; 
        }

        .auth-card {
            width: 100%;
            max-width: 450px; 
            padding: 2.5rem;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.7);
        }

        .btn-custom-red {
            background-color: #dc3545;
            color: white;
            font-weight: bold;
            border: none;
            transition: all 0.3s;
        }
        .btn-custom-red:hover {
             background-color: #b02a37;
             color: white;
             transform: translateY(-2px);
        }
        .title-red {
            color: #dc3545;
            font-weight: 800;
            letter-spacing: 1px;
        }
        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
        }
        .form-floating > label {
             color: #6c757d;
        }
    </style>
</head>
<body>

    <div class="auth-card text-center">
        <h2 class="mb-2 title-red">CAR AND CAR</h2>
        <p class="text-muted mb-4">Crie sua conta para começar</p>

        <?php if(session()->getFlashdata('erro')): ?>
            <div class="alert alert-danger py-2 small text-start">
                <?= session()->getFlashdata('erro') ?>
            </div>
        <?php endif; ?>
        
        <?php if(isset($validation)): ?>
            <div class="alert alert-danger py-2 small text-start">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('cadastro/salvar') ?>" method="post">
            
            <div class="form-floating mb-3 text-start">
                <input type="text" name="nome" class="form-control" id="floatingNome" placeholder="Seu Nome Completo" required value="<?= old('nome') ?>">
                <label for="floatingNome">Nome Completo</label>
            </div>

            <div class="form-floating mb-3 text-start">
                <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required value="<?= old('email') ?>">
                <label for="floatingEmail">E-mail</label>
            </div>
            
            <div class="form-floating mb-3 text-start">
                <input type="password" name="senha" class="form-control" id="floatingSenha" placeholder="Senha" required>
                <label for="floatingSenha">Senha</label>
            </div>

            <div class="form-floating mb-4 text-start">
                <input type="password" name="senha_confirm" class="form-control" id="floatingConfSenha" placeholder="Confirmar Senha" required>
                <label for="floatingConfSenha">Confirmar Senha</label>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-custom-red btn-lg py-2">CRIAR CONTA</button>
            </div>
        </form>

        <div class="mt-4 pt-3 border-top">
            <small class="text-muted">Já possui uma conta?</small><br>
            <a href="<?= base_url('login') ?>" class="text-decoration-none fw-bold" style="color: #dc3545;">
                Fazer Login
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>