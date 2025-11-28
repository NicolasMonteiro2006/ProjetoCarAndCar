<?= $this->extend('templates/main') ?>

<?= $this->section('conteudo') ?>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Frota de Veículos</h2>
        <a href="<?= base_url('admin/veiculos/novo') ?>" class="btn btn-success">+ Novo Veículo</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Placa</th>
                <th>Marca/Modelo</th>
                <th>Ano</th>
                <th>Cor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($veiculos as $v): ?>
            <tr>
                <td><?= $v['placa'] ?></td>
                <td><?= $v['marca'] ?> - <?= $v['modelo'] ?></td>
                <td><?= $v['ano_fabricacao'] ?>/<?= $v['ano_modelo'] ?></td>
                <td><?= $v['cor'] ?></td>
                <td>
                    <a href="<?= base_url('admin/veiculos/excluir/'.$v['id']) ?>" 
                       class="btn btn-sm btn-danger" 
                       onclick="return confirm('Tem certeza?')">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary mt-3">Voltar ao Painel</a>
</div>
<?= $this->endSection() ?>