<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Resultado do Exercício 2';
$activePage = 'exercicio2';
$requestValid = $_SERVER['REQUEST_METHOD'] === 'POST'
    && valid_csrf($_POST['csrf_token'] ?? null);
$authenticated = false;

if ($requestValid) {
    $login = trim((string) ($_POST['login'] ?? ''));
    $password = (string) ($_POST['senha'] ?? '');
    $expectedLogin = (string) ($appConfig['auth']['login'] ?? '');
    $passwordHash = (string) ($appConfig['auth']['password_hash'] ?? '');

    $authenticated = $login !== ''
        && $password !== ''
        && $passwordHash !== ''
        && hash_equals($expectedLogin, $login)
        && password_verify($password, $passwordHash);
}

require __DIR__ . '/includes/header.php';
?>

<section class="page-intro">
    <div class="container narrow">
        <p class="eyebrow">Exercício 2 · Resultado</p>
        <h1>Retorno da autenticação</h1>
        <p>O resultado abaixo foi definido pela validação feita em PHP.</p>
    </div>
</section>

<section class="section container narrow">
    <?php if (!$requestValid): ?>
        <div class="alert alert-error" role="alert">
            <span class="alert-symbol" aria-hidden="true">!</span>
            <div>
                <h2>Solicitação inválida</h2>
                <p>Abra o formulário e envie os dados novamente.</p>
            </div>
        </div>
    <?php elseif ($authenticated): ?>
        <div class="alert alert-success" role="status">
            <span class="alert-symbol" aria-hidden="true">✓</span>
            <div>
                <p class="card-label">Mensagem de retorno</p>
                <h2>Usuário Autenticado com Sucesso</h2>
                <p>As credenciais informadas são válidas.</p>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-error" role="alert">
            <span class="alert-symbol" aria-hidden="true">×</span>
            <div>
                <p class="card-label">Mensagem de retorno</p>
                <h2>Falha na autenticação</h2>
                <p>Verifique o login e a senha antes de tentar novamente.</p>
            </div>
        </div>
    <?php endif; ?>

    <div class="result-actions">
        <a class="button button-primary" href="exercicio2.php">Tentar novamente</a>
        <a class="button button-secondary" href="index.php">Voltar</a>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

