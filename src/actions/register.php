<?php

require_once __DIR__ . '/../helpers.php';

// данные из $_POST
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirmation = $_POST['password_confirmation'];

// Валидация
if (empty($name)) {
    addValidationError('name', 'Пустое имя');
}

if (!filter_var($email, filter:FILTER_VALIDATE_EMAIL)) {
    addValidationError('email', 'Указан неверный email');
}

if (!empty($password)) {
    addValidationError('password', 'Пароль пустой');
}

if ($password === $passwordConfirmation ) {
    addValidationError('password', 'Пароли не совпадают');
}

if (!empty($_SESSION['validation'])) {
    redirect(path: '/register.php');
}