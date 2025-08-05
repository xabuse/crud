<?php

require_once __DIR__ . '/src/helpers.php';

checkAuth();

$user = currentUser();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
</head>

<body>

<!--header-->

<div class="header">

    <?php
    $pause = isPause();
    $remainingTime = getTimerTime() - (time() - getTime());
    $remainingTime = max(0, $remainingTime);
    $timerTime = getTimerTime();
    ?>

    <p id="countdown">
        <?php
        if ($pause == 0) {
            echo date("H:i:s", $remainingTime);
        } else {
            echo date("H:i:s", $timerTime);
        }
        ?>
    </p>

    <script>
        const isPaused = <?php echo $pause; ?>;

        if (isPaused === 0) {
            let remaining = <?php echo $remainingTime; ?>;

            function formatTime(seconds) {
                const hrs = Math.floor(seconds / 3600);
                const mins = Math.floor((seconds % 3600) / 60);
                const secs = seconds % 60;
                return (
                    String(hrs).padStart(2, '0') + ':' +
                    String(mins).padStart(2, '0') + ':' +
                    String(secs).padStart(2, '0')
                );
            }

            function updateCountdown() {
                if (remaining >= 0) {
                    document.getElementById("countdown").textContent = formatTime(remaining);
                    remaining--;
                }
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);
        }
    </script>

    <form method="POST" action="/timerButtons.php">
        <button type="submit" name="action" value="start_timer">Start</button>
    </form>

    <form method="POST" action="/timerButtons.php">
        <button type="submit" name="action" value="pause_timer">Pause</button>
    </form>

    <form method="POST" action="/timerButtons.php">
        <button type="submit" name="action" value="reset_timer">Reset</button>
    </form>

</div>


<!--main-->
<div class="card">
    <div class="container">
        <p>abcdefghijklmnopqrstuvwzyz</p>
    </div>
</div>

</body>
</html>