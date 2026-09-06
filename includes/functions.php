<?php

declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$appConfig = require dirname(__DIR__) . '/config.php';

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="csrf_token" value="' . e(csrf_token()) . '">';
}

function valid_csrf(?string $token): bool
{
    return is_string($token)
        && isset($_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $token);
}

function normalize_spaces(string $value): string
{
    return trim((string) preg_replace('/\s+/u', ' ', $value));
}

function valid_person_name(string $value): bool
{
    return preg_match("/^[\p{L}][\p{L}\p{M}' -]{1,49}$/u", $value) === 1;
}

function student_initials(string $name): string
{
    $parts = preg_split('/\s+/u', trim($name)) ?: [];
    $parts = array_values(array_filter($parts));

    if ($parts === [] || str_starts_with($name, 'SEU ')) {
        return 'AL';
    }

    $first = mb_substr($parts[0], 0, 1, 'UTF-8');
    $last = count($parts) > 1 ? mb_substr($parts[count($parts) - 1], 0, 1, 'UTF-8') : '';

    return mb_strtoupper($first . $last, 'UTF-8');
}

function student_photo_url(array $config): ?string
{
    $relativePath = $config['student']['photo'] ?? '';

    if (!is_string($relativePath) || $relativePath === '') {
        return null;
    }

    $absolutePath = dirname(__DIR__) . '/' . ltrim(str_replace('\\', '/', $relativePath), '/');

    return is_file($absolutePath) ? $relativePath : null;
}

function configuration_pending(array $config): bool
{
    return str_starts_with((string) ($config['student']['name'] ?? ''), 'SEU ')
        || str_starts_with((string) ($config['student']['registration'] ?? ''), 'SUA ')
        || ($config['auth']['login'] ?? '') === 'SUA_CHAVE_AVA';
}

function format_decimal(float $value, int $precision = 4): string
{
    $formatted = number_format($value, $precision, ',', '.');
    $formatted = rtrim(rtrim($formatted, '0'), ',');

    return $formatted === '-0' ? '0' : $formatted;
}

