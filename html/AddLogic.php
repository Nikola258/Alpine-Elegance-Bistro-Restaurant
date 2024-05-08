<?php ob_start(); ?>
<?php require_once "connect.php" ?>


<?php
$sql = "UPDATE Restaurant_Menu
        SET name = :name, price = :price
        WHERE id = :id";

$stmt = $connection->prepare($sql);
$stmt->bindParam(":id", $_POST['id']);
$stmt->bindParam(":name", $_POST['name']);
$stmt->bindParam(":price", $_POST['price']);

$stmt->execute();
header("Location: connect.php");

?>