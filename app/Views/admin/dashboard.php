<?= $this->extend('templates/main') ?>

<?= $this->section('conteudo') ?>
<div class="container mt-5">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold text-dark">Painel Administrativo</h1>
            <p class="text-muted">Bem-vindo, <?= session()->get('nome') ?>!</p>
        </div>
    </div>

    <div class="row g-4">
        
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 bg-primary text-white">
                <div class="card-body text-center p-4">
                    <i class="bi bi-car-front-fill display-4 mb-3"></i>
                    <h4 class="card-title fw-bold">Veículos</h4>
                    <p class="card-text opacity-75">Cadastre a frota física.</p>
                    <a href="<?= base_url('admin/veiculos') ?>" class="btn btn-light text-primary fw-bold w-100 stretched-link">Acessar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 bg-success text-white">
                <div class="card-body text-center p-4">
                    <i class="bi bi-megaphone-fill display-4 mb-3"></i>
                    <h4 class="card-title fw-bold">Anúncios</h4>
                    <p class="card-text opacity-75">Gerencie as vendas.</p>
                    <a href="<?= base_url('admin/anuncios') ?>" class="btn btn-light text-success fw-bold w-100 stretched-link">Acessar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 bg-dark text-white">
                <div class="card-body text-center p-4">
                    <i class="bi bi-people-fill display-4 mb-3"></i>
                    <h4 class="card-title fw-bold text-warning">Usuários</h4>
                    <p class="card-text opacity-75">Gerenciar Admins.</p>
                    <a href="<?= base_url('admin/usuarios') ?>" class="btn btn-warning fw-bold w-100 text-dark stretched-link">
                        Gerenciar Permissões
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>