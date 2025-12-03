<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Car And Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            /* Certifique-se que a imagem 'fundo-login.jpg' está na pasta public/assets/img/ */
            background-image: url('<?= base_url("assets/img/fundo-login.jpg") ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #212529;
        }

        .login-card {
            width: 100%;    
            max-width: 400px;
            padding: 2.5rem;
            /* Fundo branco com transparência para ler o texto em cima da foto */
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
    </style>
</head>
<body>

    <div class="login-card text-center">
        <h2 class="mb-2 title-red">CAR AND CAR</h2>
        <p class="text-muted mb-4">Bem-vindo de volta!</p>

        <?php if(session()->getFlashdata('msg')): ?>
            <div class="alert alert-danger py-2 small"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('login/autenticar') ?>" method="post">
            <div class="form-floating mb-3 text-start">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">E-mail</label>
            </div>
            <div class="form-floating mb-4 text-start">
                <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Senha</label>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-custom-red btn-lg py-2">ACESSAR SISTEMA</button>
            </div>
        </form>

        <div class="mt-4 pt-3 border-top">
            <small class="text-muted">Ainda não tem conta?</small><br>
            <a href="<?= base_url('cadastro') ?>" class="text-decoration-none fw-bold" style="color: #dc3545;">
                Criar conta agora
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>