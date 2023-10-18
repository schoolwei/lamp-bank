<?php include("includes/signup.php")?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank of Lamp - Sign up</title>
    <link href="./common.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include("includes/header.php") ?>
    <div class="flex justify-center mb-8">
        <form class="flex flex-col gap-3 p-2" action="./signup.php" method="post">
            <div class="text-[3px] flex items-center justify-center">
                <pre><?php include("includes/hero_art.php") ?></pre>
            </div>
            <div class="text-2xl">
                Sign up for <br>the Bank of Lamp
            </div>
            <input value="<?=$email?>" class="text-lg border-black border-2 outline-none p-2" name="email" placeholder="Email" autocomplete="off" type="email">
            <input value="<?=$first_name?>" class="text-lg border-black border-2 outline-none p-2" name="first_name" placeholder="First name" autocomplete="off">
            <input value="<?=$last_name?>" class="text-lg border-black border-2 outline-none p-2" name="last_name" placeholder="Last name" autocomplete="off">
            <input value="<?=$password?>" class="text-lg border-black border-2 outline-none p-2" name="password" type="password" placeholder="Password">
            <input value="<?=$confirm_password?>" class="text-lg border-black border-2 outline-none p-2" name="confirm_password" type="password" placeholder="Confirm password">
            <?php
                if (!empty($error)) {
                    echo "<div class=\"text-red-500\">$error</div>";
                }
            ?>
            <button type="submit" class="py-3 border-black border-2 bg-black text-white hover:bg-white hover:text-black">Sign up -&gt;</button>
        </form>
    </div>
    <?php include("includes/footer.php") ?>
</body>

</html>