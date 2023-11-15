<?php

include ("conn.php");
include ("create_session.php");
include ("config.php");

$full_name = mysqli_escape_string($conn, $_POST['full_name']);
$password = $_POST['password'];

function login() {

    global $conn, $full_name, $password, $ACCESS_TOKEN;

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        return "";
    }
    if (empty($full_name)) {
        return "Full name is required!";
    }
    if (empty($password)) {
        return "Password is required!";
    } 

    $sql = "SELECT * FROM users WHERE full_name='$full_name'";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        return "Something went wrong";
    }

    $count = 0;

    foreach ($result as $user) {
        $ok = password_verify($password, $user["password_hash"]);
        if ($ok) {
            $count++;
            $current_user = $user;
        }
    }

    if (!$current_user) {
        return "Bad login credentials";
    }

    if ($count > 1) {
        return "Please use your user ID";
    }

    $token = create_session($current_user["id"]);
    setcookie($ACCESS_TOKEN, $token);
    header("Location: dashboard.php");
    die();
}

$error = login();

?>