<?= $this->extend('templates/main') ?>

<?= $this->section('conteudo') ?>
<div class="container mt-5">
    <div class="row">

        <div class="col-md-4">
            <div class="card shadow border-0">
                <div class="card-header bg-dark text-white fw-bold">
                    <i class="bi bi-person-lines-fill me-2"></i> Meus Dados
                </div>
                <div class="card-body">

                    <?php if (session()->getFlashdata('msg')): ?>
                        <div class="alert alert-success small"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif; ?>

                    <form action="<?= base_url('perfil/salvar') ?>" method="post" enctype="multipart/form-data">

                        <div class="text-center mb-4">
                            <?php
                            // Se tiver foto no banco, usa ela na pasta uploads/usuarios
                            // Se não tiver, gera um avatar com as iniciais
                            if (!empty($usuario['foto'])) {
                                $fotoUrl = base_url('uploads/usuarios/' . $usuario['foto']);
                            } else {
                                $fotoUrl = 'https://ui-avatars.com/api/?name=' . urlencode($usuario['nome']) . '&background=0D6EFD&color=fff&size=128';
                            }
                            ?>
                            <img src="<?= $fotoUrl ?>" class="rounded-circle shadow-sm object-fit-cover"
                                style="width: 120px; height: 120px; border: 4px solid #f8f9fa;">

                            <div class="mt-2">
                                <label class="btn btn-sm btn-outline-primary" for="inputFoto">
                                    <i class="bi bi-camera-fill"></i> Alterar Foto
                                </label>
                                <input type="file" name="foto" id="inputFoto" class="d-none" accept="image/*"
                                    onchange="document.getElementById('textFoto').innerText = 'Foto selecionada!'">
                                <div id="textFoto" class="form-text small text-muted"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nome Completo</label>
                            <input type="text" name="nome" class="form-control" value="<?= $usuario['nome'] ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">E-mail</label>
                            <input type="email" name="email" class="form-control bg-light"
                                value="<?= $usuario['email'] ?>" readonly>
                            <div class="form-text">O e-mail não pode ser alterado.</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Nova Senha</label>
                            <input type="password" name="senha" class="form-control"
                                placeholder="Deixe em branco para manter a atual">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary fw-bold">
                                <i class="bi bi-save me-2"></i> Salvar Alterações
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <h3 class="mb-4 fw-bold text-dark border-bottom pb-2">Minhas Compras</h3>

            <?php if (empty($compras)): ?>
                <div class="alert alert-light border text-center py-5">
                    <i class="bi bi-cart-x display-4 text-muted mb-3"></i>
                    <p class="lead text-muted">Você ainda não comprou nenhum veículo.</p>
                    <a href="<?= base_url() ?>" class="btn btn-outline-success mt-2">Ver Estoque Disponível</a>
                </div>
            <?php else: ?>
                <div class="row">
                    <?php foreach ($compras as $c): ?>
                        <div class="col-12 mb-3">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="row g-0 align-items-center">
                                    <div class="col-md-4">
                                        <?php $imgCarro = $c['foto_destaque'] ? base_url('uploads/' . $c['foto_destaque']) : 'https://via.placeholder.com/300x200?text=Sem+Foto'; ?>
                                        <img src="<?= $imgCarro ?>" class="img-fluid rounded-start"
                                            style="height: 100%; min-height: 150px; object-fit: cover; width: 100%;">
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h5 class="card-title fw-bold mb-1"><?= $c['titulo'] ?></h5>
                                                <span class="badge bg-success">COMPRADO</span>
                                            </div>
                                            <p class="card-text text-muted mb-2">Modelo: <?= $c['modelo'] ?></p>

                                            <div class="d-flex justify-content-between align-items-end mt-3">
                                                <div>
                                                    <small class="text-muted d-block">Data da Compra</small>
                                                    <strong><?= date('d/m/Y', strtotime($c['data_venda'])) ?></strong>
                                                </div>
                                                <div class="text-end">
                                                    <small class="text-muted d-block">Valor Pago</small>
                                                    <span class="fs-4 fw-bold text-success">R$
                                                        <?= number_format($c['valor_negociado'], 2, ',', '.') ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>