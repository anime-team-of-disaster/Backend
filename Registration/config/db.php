<?php >


require 'constants.php';


$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


if ($conn->connect_error) {
    die('database error:' . $conn->connect_error);
}
