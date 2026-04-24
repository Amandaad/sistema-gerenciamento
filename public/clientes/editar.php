<?php

declare(strict_types=1);

require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/functions.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    redirect('/clientes/index.php');
}

$stmt = $pdo->prepare('SELECT * FROM clientes WHERE id = :id');
$stmt->execute(['id' => $id]);
$cliente = $stmt->fetch();

if (!$cliente) {
    redirect('/clientes/index.php');
}

require_once __DIR__ . '/../../includes/header.php';
?>
<div class="card shadow-sm">
    <div class="card-body">
        <h1 class="h4 mb-3">Editar cliente</h1>
        <form method="post" action="/clientes/salvar.php">
            <input type="hidden" name="id" value="<?= (int) $cliente['id'] ?>">
            <div class="mb-3">
                <label class="form-label">Nome *</label>
                <input type="text" name="nome" class="form-control" required value="<?= e($cliente['nome']) ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" value="<?= e($cliente['telefone']) ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" value="<?= e($cliente['email']) ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Observações</label>
                <textarea name="observacoes" class="form-control" rows="3"><?= e($cliente['observacoes']) ?></textarea>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-primary" type="submit">Atualizar</button>
                <a href="/clientes/index.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
