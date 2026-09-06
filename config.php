<?php

declare(strict_types=1);

$config = [
    'student' => [
        'name' => 'Juan Victor Santos Vieira',
        'registration' => '25204988',
        'course' => 'Análise e Desenvolvimento de Sistemas',
        'photo' => 'assets/img/foto-aluno.jpg',
    ],
    'auth' => [
        'login' => 'SUA_CHAVE_AVA',
        // Senha fictícia padrão: SUA_SENHA_AVA
        'password_hash' => '$2y$10$/gyfolm18cXpg6smwMZoJe67rf68AH.YFhSSSX2/m.38xXNEZJozy',
    ],
];

$localConfigFile = __DIR__ . '/config.local.php';

if (is_file($localConfigFile)) {
    $localConfig = require $localConfigFile;

    if (is_array($localConfig)) {
        $config = array_replace_recursive($config, $localConfig);
    }
}

return $config;
