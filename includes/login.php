<?php

include ("conn.php");

$full_name = mysqli_escape_string($conn, $_POST['full_name']);
$password = $_POST['password'];

function login() {

    global $conn, $full_name, $password;

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

    if ($count > 1) {
        return "Please use your user ID";
    }

    if (!$current_user) {
        return "Bad login credentials";
    }

    header("Location: dashboard.php");
    die();
}

$error = login();

?>