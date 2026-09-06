<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Resultado do Exercício 1';
$activePage = 'exercicio1';
$errors = [];
$values = [];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $errors[] = 'Envie o formulário do Exercício 1 para gerar o resultado.';
} elseif (!valid_csrf($_POST['csrf_token'] ?? null)) {
    $errors[] = 'A sessão do formulário expirou. Tente novamente.';
} else {
    $name = normalize_spaces((string) ($_POST['nome'] ?? ''));
    $surname = normalize_spaces((string) ($_POST['sobrenome'] ?? ''));
    $repetitions = filter_var(
        $_POST['repeticoes'] ?? null,
        FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 1, 'max_range' => 100]]
    );

    if (!valid_person_name($name)) {
        $errors[] = 'O nome deve conter de 2 a 50 letras.';
    }

    if (!valid_person_name($surname)) {
        $errors[] = 'O sobrenome deve conter de 2 a 50 letras.';
    }

    if ($repetitions === false) {
        $errors[] = 'O número de repetições deve ser um inteiro entre 1 e 100.';
    }

    if ($errors === []) {
        for ($index = 1; $index <= $repetitions; $index++) {
            $values[] = $index % 2 === 1 ? $name : $surname;
        }
    }
}

require __DIR__ . '/includes/header.php';
?>

<section class="page-intro">
    <div class="container narrow">
        <p class="eyebrow">Exercício 1 · Resultado</p>
        <h1><?= $errors === [] ? 'Sequência concluída.' : 'Não foi possível gerar a sequência.' ?></h1>
        <p><?= $errors === [] ? 'A alternância abaixo foi produzida por um laço de repetição em PHP.' : 'Confira os dados e tente novamente.' ?></p>
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
        <div class="result-card">
            <div class="result-card-header">
                <div>
                    <p class="card-label">Total solicitado</p>
                    <h2><?= count($values) ?> repetições</h2>
                </div>
                <span class="result-badge">PHP</span>
            </div>
            <ol class="name-sequence">
                <?php foreach ($values as $value): ?>
                    <li><span><?= e($value) ?></span></li>
                <?php endforeach; ?>
            </ol>
        </div>
    <?php endif; ?>

    <div class="result-actions">
        <?php if ($errors !== []): ?>
            <a class="button button-primary" href="exercicio1.php">Corrigir dados</a>
        <?php endif; ?>
        <a class="button button-secondary" href="index.php">Voltar</a>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

