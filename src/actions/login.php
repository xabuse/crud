<?php

require_once __DIR__ . '/../helpers.php';

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setOldValue('email', $email);
    setValidationError('email', 'Неверный формат email');
    setMessage('error', 'Ошибка валидации');
    redirect('/');
}

$user = findUser($email);

if (!$user) {
    setMessage('error', "Пользователь $email не найден");
    redirect('/');
}

if (!password_verify($password, $user['password'])) {
    setMessage('error', 'Неверный логин или пароль');
    redirect('/');
}

$_SESSION['user']['id'] = $user['id'];

redirect('/home.php');