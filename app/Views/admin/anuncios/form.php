<?= $this->extend('templates/main') ?>

<?= $this->section('conteudo') ?>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0 fw-bold">Anunciar Veículo</h4>
        </div>
        <div class="card-body p-4">
            <form action="<?= base_url('admin/anuncios/salvar') ?>" method="post" enctype="multipart/form-data">
                
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Selecione o Modelo (Catálogo)</label>
                        <select name="veiculo_id" class="form-select" required>
                            <option value="">Escolha...</option>
                            <?php foreach($veiculos as $v): ?>
                                <option value="<?= $v['id'] ?>">
                                    <?= $v['marca'] ?> <?= $v['modelo'] ?> <?= $v['versao'] ?> (<?= $v['combustivel'] ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <hr>
                <h5 class="text-secondary mb-3">Dados Específicos deste Carro</h5>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Placa</label>
                        <input type="text" name="placa" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Cor</label>
                        <input type="text" name="cor" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Ano Fab.</label>
                        <input type="number" name="ano_fab" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Ano Mod.</label>
                        <input type="number" name="ano_mod" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label fw-bold text-success">Preço (R$)</label>
                        <input type="number" step="0.01" name="preco" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">KM Atual</label>
                        <input type="number" name="km_atual" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label text-primary">Foto</label>
                        <input type="file" name="foto_destaque" class="form-control" accept="image/*" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Título do Anúncio</label>
                    <input type="text" name="titulo" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea name="descricao" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-success btn-lg w-100">Publicar</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>