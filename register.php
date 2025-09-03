<?php

require_once __DIR__ . '/src/createDbAndTables.php';

require_once __DIR__ . '/src/helpers.php';

checkGuest();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/home.css">
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
</head>

<body>
<div id="particles-js"></div>

<div class="login_container">
<form class="form-group" action="src/actions/register.php" method="post" enctype="multipart/form-data">
    <div class="login_container_column">

        <p>Регистрация</p>


    <label for="name">
        <p class="p_error">Имя</p>
        <input type="text" id="name" class="label_text_input_register" name="name"  value="<?php echo old('name') ?>"
            <?php echo validationErrorAttr('name'); ?>>
        <?php if (hasValidationError('name')): ?>
            <p><?php echo validationErrorMessage('name'); ?></p>
        <?php endif; ?>
    </label>

    <label for="email">
        <p class="p_error">E-mail</p>
        <input type="text" id="email" class="label_text_input_register" name="email"  value="<?php echo old('email') ?>"
            <?php echo validationErrorAttr('email') ?>>
        <?php if (hasValidationError('email')): ?>
            <p><?php echo validationErrorMessage('email'); ?></p>
        <?php endif; ?>
    </label>


        <label for="password">
            <p class="p_error">Пароль</p>
            <input class="label_text_input_register" type="password" id="password" name="password"
                <?php echo validationErrorAttr('password') ?>>
            <?php if (hasValidationError('password')): ?>
                <p><?php echo validationErrorMessage('password'); ?></p>
            <?php endif; ?>
        </label>

        <label for="password_confirmation">
            <p class="p_error">Подтверждение пароля</p>
            <input type="password" id="password_confirmation" class="label_text_input_register" name="password_confirmation" >
        </label>


    <button class="border_btn_register" type="submit" id="submit">Продолжить</button>
        <p>У меня уже есть <a href="/index.php">аккаунт</a></p>
    </div>
</form>

</div>

<script src="assets/particleJS.js"></script>
</body>
</html>