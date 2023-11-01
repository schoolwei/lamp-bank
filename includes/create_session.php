<?php

include ("conn.php");

function create_session(int $user_id, int $minutes = 30) {
    global $conn;

    $ip = $_SERVER['REMOTE_ADDR'];
    $created_at = date('Y-m-d H:i:s', time());
    $expires_at = date('Y-m-d H:i:s', time() + 60 * $minutes);

    $token = base64_encode(random_bytes(180));
    
    $sql = "INSERT INTO `sessions` (user_id, ip, token, created_at, expires_at) "
    . "VALUES ($user_id, '$ip', '$token', '$created_at', '$expires_at');";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        throw new Exception("Something went wrong");
    }

    return $token;
}

?>