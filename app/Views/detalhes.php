<?= $this->extend('templates/main') ?>

<?= $this->section('conteudo') ?>
<div class="container mt-5">

    <a href="<?= base_url() ?>" class="btn btn-outline-secondary mb-4">
        &larr; Voltar para a Home
    </a>

    <div class="row shadow p-4 bg-white rounded">
        <div class="col-md-7 mb-4">
            <div class="card border-0">
                <?php $foto = $anuncio['foto_destaque'] ? base_url('uploads/' . $anuncio['foto_destaque']) : 'https://via.placeholder.com/800x600?text=Sem+Foto'; ?>
                <img src="<?= $foto ?>" class="img-fluid rounded shadow-sm" alt="<?= $anuncio['titulo'] ?>"
                    style="width: 100%; height: 400px; object-fit: cover;">
            </div>
        </div>

        <div class="col-md-5">
            <h2 class="fw-bold text-dark"><?= $anuncio['titulo'] ?></h2>
            <p class="text-muted mb-3">Publicado em: <?= date('d/m/Y', strtotime($anuncio['created_at'])) ?></p>

            <h1 class="text-danger fw-bold display-5 my-3">R$ <?= number_format($anuncio['preco'], 2, ',', '.') ?></h1>

            <div class="card bg-light mb-4 border-0">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-3"><i class="bi bi-gear-fill me-2"></i>Ficha Técnica</h5>
                    <ul class="list-group list-group-flush bg-transparent">
                        <li class="list-group-item bg-transparent d-flex justify-content-between">
                            <strong>Marca:</strong> <span><?= $anuncio['marca'] ?></span>
                        </li>
                        <li class="list-group-item bg-transparent d-flex justify-content-between">
                            <strong>Modelo:</strong> <span><?= $anuncio['modelo'] ?></span>
                        </li>
                        <li class="list-group-item bg-transparent d-flex justify-content-between">
                            <strong>Versão:</strong> <span><?= $anuncio['versao'] ?? 'N/A' ?></span>
                        </li>
                        <li class="list-group-item bg-transparent d-flex justify-content-between"><strong>Ano:</strong>
                            <span><?= $anuncio['ano_fabricacao'] ?>/<?= $anuncio['ano_modelo'] ?></span>
                        </li>
                        <li class="list-group-item bg-transparent d-flex justify-content-between"><strong>Cor:</strong>
                            <span><?= $anuncio['cor'] ?></span>
                        </li>
                        <li class="list-group-item bg-transparent d-flex justify-content-between">
                            <strong>Combustível:</strong> <span><?= $anuncio['combustivel'] ?></span>
                        </li>
                        <li class="list-group-item bg-transparent d-flex justify-content-between"><strong>KM:</strong>
                            <span><?= number_format($anuncio['km_atual'], 0, ',', '.') ?> km</span>
                        </li>
                        <li class="list-group-item bg-transparent d-flex justify-content-between"><strong>Final
                                Placa:</strong> <span><?= substr($anuncio['placa'], -1) ?></span></li>
                    </ul>
                </div>
            </div>

            <div class="d-grid gap-2">
                <?php if (session()->get('logged_in')): ?>
                    <a href="<?= base_url('compra/confirmar/' . $anuncio['id']) ?>" class="btn btn-success btn-lg fw-bold"
                        onclick="return confirm('Tem certeza que deseja comprar este veículo por R$ <?= number_format($anuncio['preco'], 2, ',', '.') ?>?');">
                        <i class="bi bi-cart-check me-2"></i> COMPRAR AGORA
                    </a>
                <?php else: ?>
                    <a href="<?= base_url('login') ?>" class="btn btn-warning btn-lg fw-bold">
                        Faça Login para Comprar
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h4 class="card-title fw-bold border-bottom pb-2 mb-3">Sobre este veículo</h4>
                    <p class="card-text text-secondary fs-5"><?= nl2br($anuncio['descricao']) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>