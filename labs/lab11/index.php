<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 11</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

    <?php

    $command = $_POST["command"];
    `gpio mode 7 out`;
    if ($command == "toggle") {
        `gpio toggle 7`;
    } else if ($command == "set_high") {
        `gpio write 7 1`;
    } else if ($command == "set_low") {
        `gpio write 7 0`;
    }

    $state = `gpio read 7`;

    ?>

    <h1>Lab 11</h1>
    <h2>State = <?=$state?></h2>
    <h2>Toggle</h2>
    <form method="post">
        <input type="hidden" name="command" value="toggle"/>
        <button type="submit">Toggle</button>
    </form>
    <h2>Set High</h2>
    <form method="post">
        <input type="hidden" name="command" value="set_high"/>
        <button type="submit">Set High</button>
    </form>
    <h2>Set Low</h2>
    <form method="post">
        <input type="hidden" name="command" value="set_low"/>
        <button type="submit">Set Low</button>
    </form>
</body>
</html>