<?= $this->extend('templates/main') ?>

<?= $this->section('conteudo') ?>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">Novo Anúncio</div>
        <div class="card-body">
            <form action="<?= base_url('admin/anuncios/salvar') ?>" method="post" enctype="multipart/form-data">
                
                <div class="mb-3">
                    <label>Escolha o Veículo</label>
                    <select name="veiculo_id" class="form-control" required>
                        <option value="">Selecione...</option>
                        <?php foreach ($veiculos as $v): ?>
                            <option value="<?= $v['id'] ?>">
                                <?= $v['modelo'] ?> - <?= $v['placa'] ?> (<?= $v['cor'] ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <small class="text-muted">Não achou o carro? Cadastre ele em "Veículos" primeiro.</small>
                </div>

                <div class="mb-3">
                    <label>Título do Anúncio</label>
                    <input type="text" name="titulo" class="form-control" placeholder="Ex: Civic Único Dono Baixa KM" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Preço (R$)</label>
                        <input type="number" step="0.01" name="preco" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>KM Atual</label>
                        <input type="number" name="km_atual" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Descrição Detalhada</label>
                    <textarea name="descricao" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label>Foto de Capa</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>

                <button type="submit" class="btn btn-success">Publicar Anúncio</button>
                <a href="<?= base_url('admin/anuncios') ?>" class="btn btn-outline-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>