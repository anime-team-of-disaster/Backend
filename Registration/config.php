<?php
// Poświadczenia bazy danych
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');
 
// Podłącza się do MySQL database 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// sprawdza połączenie
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>