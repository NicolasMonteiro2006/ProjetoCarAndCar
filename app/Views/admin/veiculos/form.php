<?= $this->extend('templates/main') ?>

<?= $this->section('conteudo') ?>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">Cadastrar Modelo de Veículo</div>
        <div class="card-body">
            <form action="<?= base_url('admin/veiculos/salvar') ?>" method="post">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Marca</label>
                        <input type="text" name="marca" class="form-control" placeholder="Ex: Toyota" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Modelo</label>
                        <input type="text" name="modelo" class="form-control" placeholder="Ex: Corolla" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Versão</label>
                        <input type="text" name="versao" class="form-control" placeholder="Ex: XEi 2.0" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Combustível Padrão</label>
                        <select name="combustivel" class="form-control">
                            <option value="Flex">Flex</option>
                            <option value="Gasolina">Gasolina</option>
                            <option value="Etanol">Etanol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Elétrico">Elétrico</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Salvar Modelo</button>
                <a href="<?= base_url('admin/veiculos') ?>" class="btn btn-outline-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>