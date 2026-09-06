<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Exercício 2';
$activePage = 'exercicio2';
$usesDemoCredentials = ($appConfig['auth']['login'] ?? '') === 'SUA_CHAVE_AVA';

require __DIR__ . '/includes/header.php';
?>

<section class="page-intro">
    <div class="container narrow">
        <p class="eyebrow">Exercício 2 · 2 pontos</p>
        <h1>Autenticação de usuário</h1>
        <p>Digite seu login e sua senha. A validação será feita no servidor com PHP.</p>
    </div>
</section>

<section class="section container narrow">
    <?php if ($usesDemoCredentials): ?>
        <div class="inline-notice" role="note">
            <strong>Modo de demonstração:</strong> use <code>SUA_CHAVE_AVA</code> e <code>SUA_SENHA_AVA</code>. Antes da apresentação, configure os dados locais conforme o README.
        </div>
    <?php endif; ?>

    <div class="form-layout">
        <form class="form-card" action="resultado2.php" method="post">
            <?= csrf_field() ?>

            <div class="field">
                <label for="login">Login</label>
                <input id="login" name="login" type="text" required minlength="3" maxlength="80" autocomplete="username" placeholder="Digite sua chave do AVA">
            </div>

            <div class="field">
                <label for="senha">Senha</label>
                <input id="senha" name="senha" type="password" required minlength="6" maxlength="128" autocomplete="current-password" placeholder="Digite sua senha">
                <small>A senha não será exibida na tela.</small>
            </div>

            <div class="form-actions">
                <button class="button button-primary" type="submit">Enviar</button>
                <a class="button button-secondary" href="index.php">Voltar</a>
            </div>
        </form>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
