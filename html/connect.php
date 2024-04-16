<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $connection = new PDO(dsn: "mysql:dbname=Restaurant_Menu;host=mysql_db", username: "root", password: "rootpassword");

        $sql = "SELECT * FROM Restaurant_Menu";

        $stmt = $connection->query($sql);

        while($Restaurant_Menu = $stmt->fetch()){
            echo "<div class= 'name'>" . $Restaurant_Menu["name"] . "</div>";
        }
    ?>
</body>
</html>