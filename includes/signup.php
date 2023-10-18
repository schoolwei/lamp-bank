
<?php

include ("conn.php");

$first_name = mysqli_escape_string($conn, $_POST['first_name']);
$last_name = mysqli_escape_string($conn, $_POST['last_name']);
$email = mysqli_escape_string($conn, $_POST['email']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

function signup() {

    global $conn, $email, $first_name, $last_name, $password, $confirm_password;

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
       return "";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Bad email!";
    }
    if (!preg_match("/^[\w ]+$/", $first_name)) {
        return "Bad first name!";
    }
    if (!preg_match("/^[\w ]+$/", $last_name)) {
        return "Bad last name!";
    }
    if (strlen($password) < 8) {
        return "Password is too short!";
    }
    if ($password != $confirm_password) {
        return "Passwords don't match!";
    }

    $full_name = $first_name . " " . $last_name;
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (email, full_name, first_name, last_name, credit_score, password_hash)"
            . "VALUES ('$email', '$full_name', '$first_name', '$last_name', 200, '$password_hash');";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die(mysqli_error($conn));
    }

    header("Location: login.php");
    die();
}

$error = signup();

?>
