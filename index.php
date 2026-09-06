<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Tela principal';
$activePage = 'inicio';
$student = $appConfig['student'];
$photoUrl = student_photo_url($appConfig);
$needsConfiguration = configuration_pending($appConfig);

require __DIR__ . '/includes/header.php';
?>

<section class="page-intro home-intro">
    <div class="container">
        <p class="eyebrow">Competência 1</p>
        <h1>Avaliação Formadora - Back-End</h1>
        <p>Projeto desenvolvido em PHP com uma tela principal e três exercícios.</p>
    </div>
</section>

<section class="section container">
    <h2 class="section-title">Informações do aluno</h2>

    <article class="student-card" aria-labelledby="student-name">
        <?php if ($photoUrl !== null): ?>
            <img class="student-photo" src="<?= e($photoUrl) ?>" alt="Foto de <?= e($student['name']) ?>">
        <?php else: ?>
            <div class="student-photo student-initials" aria-label="Foto do aluno ainda não adicionada">
                <?= e(student_initials((string) $student['name'])) ?>
            </div>
        <?php endif; ?>

        <div class="student-data">
            <h3 id="student-name"><?= e((string) $student['name']) ?></h3>
            <p><strong>Matrícula:</strong> <?= e((string) $student['registration']) ?></p>
            <p><strong>Curso:</strong> <?= e((string) $student['course']) ?></p>
            <p><strong>Disciplina:</strong> Desenvolvimento Back-End</p>
        </div>
    </article>

    <?php if ($needsConfiguration): ?>
        <div class="setup-notice" aria-label="Configuração pendente">
            <strong>Atenção:</strong> personalize seu nome, matrícula, foto e credenciais seguindo o arquivo <code>README.md</code>.
        </div>
    <?php endif; ?>

    <div class="section-heading-simple">
        <h2 class="section-title">Exercícios</h2>
        <p>Selecione uma opção para abrir a atividade.</p>
    </div>

    <div class="exercise-list">
        <article class="exercise-card">
            <div>
                <h3>Exercício 1 - Repetição de nomes</h3>
                <p>Apresenta nome e sobrenome alternadamente.</p>
            </div>
            <div class="exercise-actions">
                <span class="points">3 pontos</span>
                <a class="button button-primary" href="exercicio1.php">Abrir</a>
            </div>
        </article>

        <article class="exercise-card">
            <div>
                <h3>Exercício 2 - Login e senha</h3>
                <p>Verifica os dados e informa se o usuário foi autenticado.</p>
            </div>
            <div class="exercise-actions">
                <span class="points">2 pontos</span>
                <a class="button button-primary" href="exercicio2.php">Abrir</a>
            </div>
        </article>

        <article class="exercise-card">
            <div>
                <h3>Exercício 3 - Densidade</h3>
                <p>Calcula a densidade usando massa e volume.</p>
            </div>
            <div class="exercise-actions">
                <span class="points">1 ponto</span>
                <a class="button button-primary" href="exercicio3.php">Abrir</a>
            </div>
        </article>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
