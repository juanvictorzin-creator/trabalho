<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Exercício 1';
$activePage = 'exercicio1';

require __DIR__ . '/includes/header.php';
?>

<section class="page-intro">
    <div class="container narrow">
        <p class="eyebrow">Exercício 1 · 3 pontos</p>
        <h1>Alternador de nomes</h1>
        <p>Informe os dados abaixo. O PHP exibirá nome e sobrenome alternadamente até completar o número de repetições.</p>
    </div>
</section>

<section class="section container narrow">
    <div class="form-layout">
        <form class="form-card" action="resultado1.php" method="post">
            <?= csrf_field() ?>

            <div class="field">
                <label for="nome">Nome</label>
                <input id="nome" name="nome" type="text" required minlength="2" maxlength="50" autocomplete="given-name" pattern="[A-Za-zÀ-ÖØ-öø-ÿ' -]{2,50}" placeholder="Ex.: Marcelo">
                <small>Use de 2 a 50 letras.</small>
            </div>

            <div class="field">
                <label for="sobrenome">Sobrenome</label>
                <input id="sobrenome" name="sobrenome" type="text" required minlength="2" maxlength="50" autocomplete="family-name" pattern="[A-Za-zÀ-ÖØ-öø-ÿ' -]{2,50}" placeholder="Ex.: Loutfi">
                <small>Use de 2 a 50 letras.</small>
            </div>

            <div class="field">
                <label for="repeticoes">Número de repetições</label>
                <input id="repeticoes" name="repeticoes" type="number" required min="1" max="100" step="1" inputmode="numeric" placeholder="Ex.: 5">
                <small>Escolha um número inteiro entre 1 e 100.</small>
            </div>

            <div class="form-actions">
                <button class="button button-primary" type="submit">Enviar</button>
                <a class="button button-secondary" href="index.php">Voltar</a>
            </div>
        </form>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
