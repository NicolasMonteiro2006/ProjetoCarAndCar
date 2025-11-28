<?= $this->extend('templates/main') ?>

<?= $this->section('conteudo') ?>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Anúncios Publicados</h2>
        <a href="<?= base_url('admin/anuncios/novo') ?>" class="btn btn-success">+ Criar Anúncio</a>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Título</th>
                <th>Preço</th>
                <th>Veículo Base</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anuncios as $a): ?>
            <tr>
                <td>
                    <?php if($a['foto_destaque']): ?>
                        <img src="<?= base_url('uploads/'.$a['foto_destaque']) ?>" width="50">
                    <?php else: ?>
                        Sem foto
                    <?php endif; ?>
                </td>
                <td><?= $a['titulo'] ?></td>
                <td>R$ <?= number_format($a['preco'], 2, ',', '.') ?></td>
                <td><?= $a['modelo'] ?> (<?= $a['placa'] ?>)</td>
                <td><span class="badge bg-success"><?= $a['status'] ?></span></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary mt-3">Voltar ao Painel</a>
</div>
<?= $this->endSection() ?>