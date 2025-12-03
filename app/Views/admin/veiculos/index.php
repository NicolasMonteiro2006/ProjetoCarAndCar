<?= $this->extend('templates/main') ?>

<?= $this->section('conteudo') ?>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Catálogo de Modelos</h2>
        <a href="<?= base_url('admin/veiculos/novo') ?>" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Novo Modelo
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover table-bordered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Versão</th>
                        <th>Combustível</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($veiculos)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-4">Nenhum modelo cadastrado.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($veiculos as $v): ?>
                        <tr>
                            <td><?= $v['id'] ?></td>
                            <td><?= $v['marca'] ?></td>
                            <td><strong><?= $v['modelo'] ?></strong></td>
                            <td><?= $v['versao'] ?></td>
                            <td><?= $v['combustivel'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/veiculos/excluir/'.$v['id']) ?>" 
                                   class="btn btn-sm btn-danger" 
                                   onclick="return confirm('ATENÇÃO: Excluir este modelo apagará TODOS os anúncios ligados a ele. Continuar?')">
                                   <i class="bi bi-trash-fill"></i> Excluir
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary mt-3">
        <i class="bi bi-arrow-left"></i> Voltar ao Painel
    </a>
</div>
<?= $this->endSection() ?>