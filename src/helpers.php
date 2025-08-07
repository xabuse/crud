<?php

session_start();

require_once __DIR__ . '/config.php';

function redirect(string $path)
{
    header("Location: $path");
    die();
}

function setValidationError(string $fieldName, string $message): void
{
    $_SESSION['validation'][$fieldName] = $message;
}

function hasValidationError(string $fieldName): bool
{
    return isset($_SESSION['validation'][$fieldName]);
}

function validationErrorAttr(string $fieldName): string
{
    return isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
}

function validationErrorMessage(string $fieldName): string
{
    $message = $_SESSION['validation'][$fieldName] ?? '';
    unset($_SESSION['validation'][$fieldName]);
    return $message;
}

function setOldValue(string $key, mixed $value): void
{
    $_SESSION['old'][$key] = $value;
}

function old(string $key)
{
    $value = $_SESSION['old'][$key] ?? '';
    unset($_SESSION['old'][$key]);
    return $value;
}

function setMessage(string $key, string $message): void
{
    $_SESSION['message'][$key] = $message;
}


function hasMessage(string $key): bool
{
    return isset($_SESSION['message'][$key]);
}

function getMessage(string $key): string
{
    $message = $_SESSION['message'][$key] ?? '';
    unset($_SESSION['message'][$key]);
    return $message;
}

function getPDO(): PDO
{
    try {
        return new PDO(
            dsn: 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME,
            username: DB_USERNAME,
            password: DB_PASSWORD
        );
    } catch (\PDOException $e) {
        die($e->getMessage());
    }
}

function findUser(string $email): array|bool
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM users WHERE `email` = :email");
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function currentUser(): array|false
{
    $pdo = getPDO();

    if (!isset($_SESSION['user'])) {
        return false;
    }

    $userId = $_SESSION['user']['id'] ?? null;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE `id` = :id");
    $stmt->execute(['id' => $userId]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function logout(): void
{
    unset($_SESSION['user']['id']);
    redirect('/');
}

// Редирект на главную, когда неавторизированы
function checkAuth(): void
{
    if (!isset($_SESSION['user']['id'])) {
        redirect('/');
    }
}

// Редирект с логина и регистрации, когда авторизированы
function checkGuest(): void
{
    if (isset($_SESSION['user']['id'])) {
        redirect('/home.php');
    }
}

// Create db entry with email if not here yet.
function createFirstTimer()
{
    $pdo = getPDO();
    $email = currentUser()['email'];
    $check = getTimerTime();

    if (!isset($check)) {
        $stmt = $pdo->prepare("
            INSERT INTO timer (email)
            VALUES (:email)
    ");
        $stmt->execute(['email' => $email]);
    }
}


// in timer get timerTime where email==email, if email not in timer: create email and return timerTime where email==email
function getTimerTime()
{
    $pdo = getPDO();

    $email = currentUser()['email'];

    $stmt = $pdo->prepare("SELECT timerTime FROM timer WHERE `email` = :email");
    $stmt->execute(['email' => $email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC)['timerTime'] ?? '';
    return $result;
}

function getTime()
{
    $pdo = getPDO();

    $email = currentUser()['email'];

    $stmt = $pdo->prepare("SELECT timeStart FROM timer WHERE `email` = :email");
    $stmt->execute(['email' => $email]);

    return $stmt->fetch(PDO::FETCH_ASSOC)['timeStart'];
}

function isPause(): int
{
    $pdo = getPDO();

    $email = currentUser()['email'];

    $stmt = $pdo->prepare("SELECT isPause FROM timer WHERE `email` = :email");
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(\PDO::FETCH_ASSOC)['isPause'];
}

function startButton()
{
    $pdo = getPDO();
    $email = currentUser()['email'];

    $stmt = $pdo->prepare("
            REPLACE INTO timer (timeStart, email, isPause, timerTime)
            VALUES (:timeStart, :email, :isPause, :timerTime)
        ");

    $stmt->execute(['timeStart' => time(), 'email' => $email, 'isPause' => 0, 'timerTime' => getTimerTime()]);
}

function pauseButton()
{
    $pdo = getPDO();
    $email = currentUser()['email'];

    $timerTime = getTimerTime() - (time() - getTime());

    if ($timerTime <= 0) {
        $timerTime = 0;
    }

    $stmt = $pdo->prepare("
            REPLACE INTO timer (timerTime, email, isPause)
            VALUES (:timerTime, :email, :isPause)
        ");

    $stmt->execute(['timerTime' => $timerTime, 'email' => $email, 'isPause' => 1]);
}

function resetButton()
{
    $pdo = getPDO();
    $email = currentUser()['email'];

    $timerTime = getTimerTime() - (time() - getTime());

    $stmt = $pdo->prepare("
            REPLACE INTO timer (email, isPause)
            VALUES (:email, :isPause)
        ");

    $stmt->execute(['email' => $email, 'isPause' => 1]);
}