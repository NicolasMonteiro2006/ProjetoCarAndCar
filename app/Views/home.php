<?= $this->extend('templates/main') ?>

<?= $this->section('conteudo') ?>

<header class="hero">
    <div class="container">
        <h1>Encontre seu próximo carro</h1>
        <p class="lead">As melhores ofertas da Loja Car And Car estão aqui.</p>
    </div>
</header>

<div class="container mt-5">
    <h3 class="mb-4">Destaques Recentes</h3>

    <div class="row">
        <?php if (!empty($anuncios)): ?>
            <?php foreach ($anuncios as $carro): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="<?= base_url('uploads/' . ($carro['foto_destaque'] ?: 'sem-foto.jpg')) ?>"
                            class="card-img-top" alt="Foto do carro">

                        <div class="card-body">
                            <h5 class="card-title"><?= $carro['titulo'] ?></h5>
                            <p class="card-text text-muted">
                                <?= $carro['marca'] ?>         <?= $carro['modelo'] ?> - <?= $carro['ano_modelo'] ?>
                            </p>
                            <h4 class="text-danger">R$ <?= number_format($carro['preco'], 2, ',', '.') ?></h4>
                        </div>
                        <div class="card-footer bg-white border-top-0">
                            <a href="<?= base_url('carro/' . $carro['id']) ?>" class="btn btn-outline-dark w-100">Ver
                                Detalhes</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p class="alert alert-warning">Nenhum veículo cadastrado no momento.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>