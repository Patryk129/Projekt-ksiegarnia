<?php
session_start();
if(!isset($_SESSION['log']))
{
    header('location:index.php');
    exit();
}
require 'connect.php';
$id_klienta = $_SESSION['log'];
$query = "SELECT liczba_egz, ksiazki.id_ksiazki, tytul, 
    concat(autor.imie,' ',autor.nazwisko) as autor2, cena, ilosc, opis 
    FROM zamowieniee z
    inner join zamowione_produkty zp on z.id_zamowienia = zp.id_zamowienia 
    inner join ksiazki on zp.id_produktu = ksiazki.id_ksiazki 
    inner join autor on ksiazki.id_autora = autor.id_autora
    WHERE z.id_klienta = $id_klienta 
    AND liczba_egz > 0 and data_zlozenia_zamowienia IS NULL";
$result = mysqli_query($conn,$query);
$sum = 0;
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/order.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Księgarnia Internetowa</h1>
        </div>
        <nav>
            <a href="index.php">Powrót do strony głównej</a>
        </nav>
    </header>
    <main>
        <?php
            if(mysqli_num_rows($result)==0){
                echo "<div class = 'book-item'>Twój koszyk jest pusty.</div>";
                exit;
            }
            while($row = $result->fetch_assoc()) 
            {
                    echo '<div class="book-item">';
                    echo '<img src="' . $row["opis"] . '" alt="' . $row["opis"] . '">';
                    echo '<h3>' . $row["tytul"] . '</h3>';
                    echo '<p>Autor: ' . $row["autor2"] . '</p>';
                    echo '<p>Ilosc sztuk: '.$row['liczba_egz'].'</p>';
                    echo '<p>Cena: ' . $row["cena"]*$row['liczba_egz'] . ' PLN</p>';
                    echo '<form method="POST" action="remove_from_cart.php">';
                    echo '<input type="hidden" name="id_ksiazki" value="' . $row["id_ksiazki"] . '">';
                    echo '<button type="submit" name="add_to_cart">Usuń</button>';
                    echo '</form>';
                    echo '</div>';
                $sum += $row["cena"]*$row['liczba_egz'];
            }
        ?>
        <?php if($sum>0)echo '<div id="sum">SUMA: '.$sum. ' PLN</div>'; ?>
    </main>
    <form action="order2.php" method="post">
        <input type="hidden" name="id_klienta" value= <?php echo $id_klienta; ?>>
        <button type="submit">Zamów</button>
    </form>
</body>
</html>
