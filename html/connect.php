<?php
$connection = new PDO(dsn: "mysql:dbname=Restaurant_Menu;host=mysql_db", username: "root", password: "rootpassword");

$sql = "SELECT * FROM Restaurant_Menu";

$stmt = $connection->query($sql);

while($Restaurant_Menu = $stmt->fetch()){
    echo "<div>" . $Restaurant_Menu["name"] . "</div>";
}
?>