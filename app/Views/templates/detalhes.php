<?= $this->extend('templates/main') ?>

<?= $this->section('conteudo') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-7 mb-4">
            <div class="card shadow-sm">
                <img src="<?= base_url('uploads/' . ($anuncio['foto_destaque'] ?: 'sem-foto.jpg')) ?>" class="card-img-top" alt="<?= $anuncio['titulo'] ?>" style="height: 400px; object-fit: cover;">
            </div>
        </div>

        <div class="col-md-5">
            <h2 class="fw-bold"><?= $anuncio['titulo'] ?></h2>
            <h1 class="text-danger fw-bold my-3">R$ <?= number_format($anuncio['preco'], 2, ',', '.') ?></h1>

            <div class="card mb-4">
                <div class="card-header bg-dark text-white">Ficha Técnica</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between"><strong>Marca/Modelo:</strong> <span><?= $anuncio['marca'] ?> <?= $anuncio['modelo'] ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><strong>Versão:</strong> <span><?= $anuncio['versao'] ?: 'N/A' ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><strong>Ano:</strong> <span><?= $anuncio['ano_fabricacao'] ?>/<?= $anuncio['ano_modelo'] ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><strong>Cor:</strong> <span><?= $anuncio['cor'] ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><strong>Combustível:</strong> <span><?= $anuncio['combustivel'] ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><strong>KM Atual:</strong> <span><?= number_format($anuncio['km_atual'], 0, ',', '.') ?> km</span></li>
                    <li class="list-group-item d-flex justify-content-between"><strong>Final da Placa:</strong> <span><?= substr($anuncio['placa'], -1) ?></span></li>
                </ul>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-success btn-lg">Tenho Interesse</button>
                <a href="<?= base_url() ?>" class="btn btn-outline-secondary">Voltar para a Home</a>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">Sobre este veículo</h4>
                    <p class="card-text"><?= nl2br($anuncio['descricao']) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>