<?php

declare(strict_types=1);

require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/functions.php';

$clientes = $pdo->query('SELECT id, nome, telefone, email, criado_em FROM clientes ORDER BY id DESC')->fetchAll();

require_once __DIR__ . '/../../includes/header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Clientes</h1>
    <a href="/clientes/novo.php" class="btn btn-success">Novo cliente</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Criado em</th>
                    <th class="text-end">Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!$clientes): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">Nenhum cliente cadastrado.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?= (int) $cliente['id'] ?></td>
                            <td><?= e($cliente['nome']) ?></td>
                            <td><?= e($cliente['telefone']) ?></td>
                            <td><?= e($cliente['email']) ?></td>
                            <td><?= e($cliente['criado_em']) ?></td>
                            <td class="text-end">
                                <a href="/clientes/editar.php?id=<?= (int) $cliente['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                                <a href="/clientes/excluir.php?id=<?= (int) $cliente['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Excluir este cliente?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
