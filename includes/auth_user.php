<?php

include ("conn.php");
include ("config.php");

function auth_user() {
    global $ACCESS_TOKEN, $conn;
    $token = mysqli_escape_string($conn, $_COOKIE[$ACCESS_TOKEN]);

    $sql = "SELECT * FROM `sessions` WHERE token = '$token' AND expires_at < now();";
    $result = mysqli_query($conn, $sql);

    // $session = $result[0];

    foreach ($result as $session) {
        echo var_dump($session);
    }
    die();
}

?>