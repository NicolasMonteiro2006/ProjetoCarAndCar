<?= $this->extend('templates/main') ?>

<?= $this->section('conteudo') ?>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Gerenciar Permissões</h2>
        <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary">Voltar</a>
    </div>

    <?php if(session()->getFlashdata('msg')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Status Atual</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <td class="align-middle">
                            <?php if($u['foto']): ?>
                                <img src="<?= base_url('uploads/usuarios/'.$u['foto']) ?>" width="30" height="30" class="rounded-circle me-2 object-fit-cover">
                            <?php endif; ?>
                            <?= $u['nome'] ?>
                        </td>
                        <td class="align-middle"><?= $u['email'] ?></td>
                        <td class="align-middle">
                            <?php if($u['tipo'] == 'admin'): ?>
                                <span class="badge bg-warning text-dark">ADMIN</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Usuário</span>
                            <?php endif; ?>
                        </td>
                        <td class="align-middle">
                            <?php if($u['tipo'] == 'usuario'): ?>
                                <a href="<?= base_url('admin/usuarios/tornarAdmin/'.$u['id']) ?>" 
                                   class="btn btn-sm btn-outline-success fw-bold"
                                   onclick="return confirm('Tem certeza que quer dar poder total a este usuário?')">
                                   <i class="bi bi-arrow-up-circle"></i> Promover a Admin
                                </a>
                            <?php else: ?>
                                <a href="<?= base_url('admin/usuarios/removerAdmin/'.$u['id']) ?>" 
                                   class="btn btn-sm btn-outline-danger"
                                   onclick="return confirm('Remover acesso de admin deste usuário?')">
                                   <i class="bi bi-arrow-down-circle"></i> Remover Admin
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>