<?php

declare(strict_types=1);

$pageTitle = $pageTitle ?? 'AVAFORMADORA';
$activePage = $activePage ?? '';
$navItems = [
    'inicio' => ['label' => 'Principal', 'href' => 'index.php'],
    'exercicio1' => ['label' => 'Exercício 1', 'href' => 'exercicio1.php'],
    'exercicio2' => ['label' => 'Exercício 2', 'href' => 'exercicio2.php'],
    'exercicio3' => ['label' => 'Exercício 3', 'href' => 'exercicio3.php'],
];
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Avaliação Formadora de Back-End desenvolvida em PHP.">
    <meta name="theme-color" content="#092a49">
    <title><?= e($pageTitle) ?> | AVAFORMADORA</title>
    <link rel="stylesheet" href="assets/css/simple.css">
    <script src="assets/js/app.js" defer></script>
</head>
<body>
    <a class="skip-link" href="#conteudo">Ir para o conteúdo</a>
    <header class="site-header">
        <div class="container header-inner">
            <a class="brand" href="index.php" aria-label="AVAFORMADORA - página principal">
                <img src="assets/img/unisuam-logo.jpg" alt="UNISUAM" width="170" height="44">
                <span class="brand-copy">
                    <strong>Projeto de Back-End</strong>
                    <small>Avaliação Formadora</small>
                </span>
            </a>

            <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="menu-principal">
                <span class="nav-toggle-lines" aria-hidden="true"><i></i><i></i><i></i></span>
                <span>Menu</span>
            </button>

            <nav id="menu-principal" class="main-nav" aria-label="Navegação principal">
                <?php foreach ($navItems as $key => $item): ?>
                    <a href="<?= e($item['href']) ?>"<?= $activePage === $key ? ' class="active" aria-current="page"' : '' ?>>
                        <?= e($item['label']) ?>
                    </a>
                <?php endforeach; ?>
            </nav>
        </div>
    </header>

    <main id="conteudo">
