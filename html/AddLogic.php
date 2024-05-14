<?php
$host = "localhost";
$username = "root";
$password = "rootpassword";
$dbname = "Menu";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

    $stmt = $conn->prepare("INSERT INTO Menu (name, price) VALUES (:name, :price)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);

    $name = 'Pepperoni Pizza';
    $price = '12.00';

    $stmt->execute();

    echo "New record created successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
?>