<?php

declare(strict_types=1);

require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/functions.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nome = trim((string) ($_POST['nome'] ?? ''));
$telefone = trim((string) ($_POST['telefone'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$observacoes = trim((string) ($_POST['observacoes'] ?? ''));

if ($nome === '') {
    redirect('/clientes/index.php');
}

if ($id) {
    $stmt = $pdo->prepare('UPDATE clientes SET nome = :nome, telefone = :telefone, email = :email, observacoes = :observacoes WHERE id = :id');
    $stmt->execute([
        'id' => $id,
        'nome' => $nome,
        'telefone' => $telefone,
        'email' => $email,
        'observacoes' => $observacoes,
    ]);
} else {
    $stmt = $pdo->prepare('INSERT INTO clientes (nome, telefone, email, observacoes) VALUES (:nome, :telefone, :email, :observacoes)');
    $stmt->execute([
        'nome' => $nome,
        'telefone' => $telefone,
        'email' => $email,
        'observacoes' => $observacoes,
    ]);
}

redirect('/clientes/index.php');
