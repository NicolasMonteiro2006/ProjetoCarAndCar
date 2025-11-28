<?= $this->extend('templates/main') ?>

<?= $this->section('conteudo') ?>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">Cadastrar Veículo</div>
        <div class="card-body">
            <form action="<?= base_url('admin/veiculos/salvar') ?>" method="post">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Placa</label>
                        <input type="text" name="placa" class="form-control" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Marca</label>
                        <input type="text" name="marca" class="form-control" placeholder="Ex: Honda" required>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label>Modelo</label>
                        <input type="text" name="modelo" class="form-control" placeholder="Ex: Civic LXR" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Ano Fab.</label>
                        <input type="number" name="ano_fabricacao" class="form-control" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Ano Mod.</label>
                        <input type="number" name="ano_modelo" class="form-control" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Cor</label>
                        <input type="text" name="cor" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Combustível</label>
                        <select name="combustivel" class="form-control">
                            <option value="Flex">Flex</option>
                            <option value="Gasolina">Gasolina</option>
                            <option value="Etanol">Etanol</option>
                            <option value="Diesel">Diesel</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Salvar Veículo</button>
                <a href="<?= base_url('admin/veiculos') ?>" class="btn btn-outline-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>