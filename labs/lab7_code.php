<?php

include(dirname(__DIR__).'/includes/db_conn.php');

$sql = "select * from users;";
$result = mysqli_query($conn, $sql);
echo mysqli_num_rows($result) . " users \n";

foreach ($result as $row) {
  echo "id: {$row["id"]} | name: {$row["first_name"]} {$row["last_name"]}\n";
}

$sql = "INSERT INTO users (first_name, last_name, password_hash, credit_score) 
        VALUES ('Hermione', 'Granger', '123123', 300);";

$result = mysqli_query($conn, $sql);

$error = mysqli_error($conn);

echo $result ? "Success!" : "Failure: $error"; 

?>