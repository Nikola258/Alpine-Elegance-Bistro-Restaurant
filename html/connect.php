<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['username'])){

        }
        else{
            header(header: *Location: connect.php*);
        }

        $connection = new PDO(dsn: "mysql:dbname=menu;host=mysql_db", username: "root", password: "rootpassword");

        $sql = "SELECT * FROM Restaurant_Menu";

        $stmt = $connection->query($sql);

        while($Restaurant_Menu = $stmt->fetch()){
            echo "<div class= 'name'>" . $Restaurant_Menu["name"] . "</div>";
            echo "<div class= 'price'>" . $Restaurant_Menu["price"] . "</div>";
        }
    ?>
    
    <ul>
        <li><a href="#">Verwijder gerecht</a></li>
        <li><a href="#">Voeg nieuwe gerecht toe</a></li>
        <li><a href="#">Prijs veranderen</a></li>
    </ul>

</body>
</html>