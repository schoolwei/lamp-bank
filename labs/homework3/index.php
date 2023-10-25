<?php

$json = file_get_contents("./emojis.json");
$emojis = json_decode($json, true);
$json = file_get_contents("./repos.json");
$repos = json_decode($json, true);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using JSON</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>
    <h1>Homework 3</h1>
    <h2>5.2.2.2</h2>
    <details>
        <summary>Show Emojis</summary>
        <pre><?= var_dump($emojis) ?></pre>
    </details>
    <h2>5.2.2.3</h2>
    <pre><?php echo $emojis["woman_technologist"] ?></pre>

    <h2>5.3.2.2</h2>
    <pre><?php echo $repos[2]["name"] ?></pre>

    <h2>5.3.2.3</h2>
    <pre><?php echo $repos[2]["visibility"] ?></pre>

    <h2>5.3.2.4</h2>
    <pre><?php echo $repos[2]["created_at"] ?></pre>
    
</body>

</html>