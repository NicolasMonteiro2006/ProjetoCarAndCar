<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Car And Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        /* Estilos personalizados */
        .navbar-brand span { color: #dc3545; font-weight: 900; font-style: italic; }
        .user-avatar { width: 35px; height: 35px; object-fit: cover; border: 2px solid #dc3545; padding: 1px;}
        .dropdown-item.text-danger:hover { background-color: #dc3545; color: white !important; }
        
        /* Ajuste para o rodapé ficar sempre embaixo */
        body { background-color: #f8f9fa; min-height: 100vh; display: flex; flex-direction: column; }
        footer { margin-top: auto; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-white fs-4" href="<?= base_url() ?>">
                CAR <span>&</span> CAR
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    
                    <li class="nav-item">
                        <a class="nav-link px-3 active" aria-current="page" href="<?= base_url() ?>">Home</a>
                    </li>

                    <?php if (session()->get('logged_in')): ?>
                        
                        <li class="nav-item dropdown ms-lg-3">
                            <?php 
                                // Lógica da Foto: Se não tiver, gera avatar com iniciais
                                $nomeUser = session()->get('nome') ?? 'Usuário';
                                $fotoSalva = session()->get('foto');
                                $fotoUrl = $fotoSalva ? base_url('uploads/usuarios/' . $fotoSalva) : 'https://ui-avatars.com/api/?name=' . urlencode($nomeUser) . '&background=0D6EFD&color=fff';
                            ?>
                            
                            <a class="nav-link dropdown-toggle d-flex align-items-center pe-0" href="#" role="button" data-bs-toggle="dropdown">
                                <img src="<?= $fotoUrl ?>" alt="<?= $nomeUser ?>" class="user-avatar rounded-circle me-2">
                                <span class="text-white fw-semibold"><?= $nomeUser ?></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end shadow mt-2">
                                <li><h6 class="dropdown-header">Olá, <?= strtok($nomeUser, " ") ?></h6></li>
                                
                                <?php if (session()->get('tipo') === 'admin'): ?>
                                    <li>
                                        <a class="dropdown-item text-warning fw-bold" href="<?= base_url('admin/dashboard') ?>">
                                            <i class="bi bi-speedometer2 me-2"></i> Painel Admin
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi bi-person me-2"></i> Meus Dados
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <li><hr class="dropdown-divider border-secondary"></li>
                                
                                <li>
                                    <a class="dropdown-item text-danger" href="<?= base_url('logout') ?>">
                                        <i class="bi bi-box-arrow-right me-2"></i> Sair
                                    </a>
                                </li>
                            </ul>
                        </li>

                    <?php else: ?>
                        <li class="nav-item ms-lg-2">
                            <a class="nav-link" href="<?= base_url('login') ?>">Entrar</a>
                        </li>
                        <li class="nav-item ms-lg-2">
                            <a class="btn btn-danger px-4 rounded-pill fw-bold" href="<?= base_url('cadastro') ?>">Cadastre-se</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4 flex-grow-1">
        <?= $this->renderSection('conteudo') ?>
    </main>

    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-md-start mb-3 mb-md-0">
                    <h5 class="fw-bold mb-1">CAR <span class="text-danger">&</span> CAR</h5>
                    <small class="text-white-50">Transparência e qualidade na sua compra.</small>
                </div>
                <div class="col-md-6 text-md-end">
                    <small class="text-white-50">&copy; <?= date('Y') ?> Loja Car And Car.</small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>