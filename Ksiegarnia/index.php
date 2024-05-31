<?php
require 'connect.php';
if (isset($_POST['search'])) 
{
    $search_term = $_POST['search'];
    $query = "SELECT id_ksiazki, tytul, concat(autor.imie,' ',autor.nazwisko) as autor2, cena, ilosc, opis FROM ksiazki inner join autor on ksiazki.id_autora = autor.id_autora WHERE tytul LIKE '$search_term%' AND ilosc>0";
    $result = mysqli_query($conn,$query);
}
else
{
    $query = "SELECT id_ksiazki, tytul, concat(autor.imie,' ',autor.nazwisko) as autor2, cena, ilosc, opis FROM ksiazki inner join autor on ksiazki.id_autora = autor.id_autora WHERE ilosc>0";
    $result = mysqli_query($conn,$query);
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Ksiegarnia</title>
    <html lang="pl">
    <meta charset="UTF-8">
    <meta name="author" content="Patryk Polak">
    <meta name="description" content="Ksiegarnia po prostu.">
    <meta name="keywords" content="ksiażki, ksiegarnia, kupowanie ">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/booklist.css">
</head>
<body>
    <?php 
    session_start();
    if(isset($_SESSION['log']))
    {
        require_once 'header2.php';
    }
    else
    {
        require_once 'header.php';
    }
    ?>
    <main>
        <div class="book-list">
            <?php 
                if ($result->num_rows > 0) 
                {
                    while($row = $result->fetch_assoc()) 
                    {
                        echo '<div class="book-item">
                        <img src="' . $row["opis"] . '" alt="' . $row["opis"] . '">
                        <h3>' . $row["tytul"] . '</h3>
                        <p>Autor: ' . $row["autor2"] . '</p>
                        <p>Cena: ' . $row["cena"] . ' PLN</p>';
                        if(isset($_SESSION['log']))
                        {
                            echo '<form method="POST" action="add_to_cart.php">
                            <input type="hidden" name="id_ksiazki" value="' . $row["id_ksiazki"] . '">
                            <button type="submit" name="add_to_cart">Dodaj do koszyka</button>';
                        }
                        echo '</form>
                        </div>';
                    }
                }
            ?>
        </div>
    </main>
    <?php require 'footer.php'?>
</body>
</html>