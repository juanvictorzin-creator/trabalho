<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Resultado do Exercício 3';
$activePage = 'exercicio3';
$errors = [];
$density = null;
$mass = null;
$volume = null;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $errors[] = 'Envie o formulário do Exercício 3 para calcular a densidade.';
} elseif (!valid_csrf($_POST['csrf_token'] ?? null)) {
    $errors[] = 'A sessão do formulário expirou. Tente novamente.';
} else {
    $mass = filter_var($_POST['massa'] ?? null, FILTER_VALIDATE_FLOAT);
    $volume = filter_var($_POST['volume'] ?? null, FILTER_VALIDATE_FLOAT);

    if ($mass === false || $mass <= 0 || $mass > 1000000000) {
        $errors[] = 'A massa deve ser um número maior que zero.';
    }

    if ($volume === false || $volume <= 0 || $volume > 1000000000) {
        $errors[] = 'O volume deve ser um número maior que zero.';
    }

    if ($errors === []) {
        $density = $mass / $volume;

        if (!is_finite($density)) {
            $errors[] = 'Não foi possível calcular a densidade com os valores informados.';
            $density = null;
        }
    }
}

require __DIR__ . '/includes/header.php';
?>

<section class="page-intro">
    <div class="container narrow">
        <p class="eyebrow">Exercício 3 · Resultado</p>
        <h1><?= $errors === [] ? 'Densidade calculada.' : 'Não foi possível calcular.' ?></h1>
        <p><?= $errors === [] ? 'O PHP dividiu a massa pelo volume e produziu o resultado abaixo.' : 'Confira os dados informados e tente novamente.' ?></p>
    </div>
</section>

<section class="section container narrow">
    <?php if ($errors !== []): ?>
        <div class="alert alert-error" role="alert">
            <span class="alert-symbol" aria-hidden="true">!</span>
            <div>
                <h2>Dados inválidos</h2>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= e($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php else: ?>
        <div class="density-result" role="status">
            <p class="card-label">O valor da densidade é</p>
            <p class="density-value"><?= e(format_decimal((float) $density)) ?> <span>g/cm³</span></p>
            <div class="calculation-line">
                <span>d = m ÷ v</span>
                <span>d = <?= e(format_decimal((float) $mass)) ?> ÷ <?= e(format_decimal((float) $volume)) ?></span>
            </div>
        </div>
    <?php endif; ?>

    <div class="result-actions">
        <?php if ($errors !== []): ?>
            <a class="button button-primary" href="exercicio3.php">Corrigir dados</a>
        <?php endif; ?>
        <a class="button button-secondary" href="index.php">Voltar</a>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

