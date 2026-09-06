<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Exercício 3';
$activePage = 'exercicio3';

require __DIR__ . '/includes/header.php';
?>

<section class="page-intro">
    <div class="container narrow">
        <p class="eyebrow">Exercício 3 · 1 ponto</p>
        <h1>Calculadora de densidade</h1>
        <p>Informe a massa e o volume para calcular a densidade pela fórmula d = m/v.</p>
    </div>
</section>

<section class="section container narrow">
    <div class="form-layout">
        <form class="form-card" action="resultado3.php" method="post">
            <?= csrf_field() ?>

            <div class="field">
                <label for="massa">Massa</label>
                <div class="input-with-unit">
                    <input id="massa" name="massa" type="number" required min="0.0001" max="1000000000" step="any" inputmode="decimal" placeholder="Ex.: 8">
                    <span>g</span>
                </div>
                <small>Informe um número maior que zero.</small>
            </div>

            <div class="field">
                <label for="volume">Volume</label>
                <div class="input-with-unit">
                    <input id="volume" name="volume" type="number" required min="0.0001" max="1000000000" step="any" inputmode="decimal" placeholder="Ex.: 4">
                    <span>cm³</span>
                </div>
                <small>O volume não pode ser zero.</small>
            </div>

            <div class="form-actions">
                <button class="button button-primary" type="submit">Enviar</button>
                <a class="button button-secondary" href="index.php">Voltar</a>
            </div>
        </form>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
