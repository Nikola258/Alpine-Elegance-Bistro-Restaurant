<?php
$connection = new PDO(dsn: "mysql:dbname=menu;host=mysql_db", username: "root", password: "rootpassword");

?>


<?php

$host = 'mysql_db';
$db = 'school';
$user = ''; 
$pass = 

$dsn = "mysql:host=$host;dbname=$db";
$conn = new PDO($dsn, $user, $pass);

$statement = $conn->prepare("INSERT INTO Restaurant menu (name, price) VALUES(:name, :price)")

$statement->bindParam(":placeholder, $_POST['name']");
$statement->bindParam(":placeholder, $_POST['price']");
$statement->execute();

var_dump($_POST);
header("Location: index.php");
?>