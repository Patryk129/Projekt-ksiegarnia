<?php
require 'admin.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/admin.css">
</head>
<body>
<?php require 'header4.php'?>
<aside>
    <a href="client.php"><button class="menu">Zarządzaj klientami</button></a>
    <a href="book.php"><button class="menu">Zarządzaj książkami</button></a>
    </aside>
    <main class="main-left">
    <a href="addbook.php"><button id="ad">Dodaj książkę</button></a>
    <table>
        <tr>
            <td>Id ksiazki</td>
            <td>Tytuł</td>
            <td>Autor</td>
            <td>Cena</td>
            <td>Ilosc</td>
            <td>Usun</td>
        </tr>
        <?php
        require 'connect.php';
        $query2 = "SELECT id_ksiazki, tytul, concat(imie, ' ', nazwisko) as autor, cena, ilosc from ksiazki inner join autor on ksiazki.id_autora = autor.id_autora";
        $result2 = mysqli_query($conn,$query2);
        while($row = mysqli_fetch_assoc($result2))
        {
            echo '<tr>';
            echo '<td>' . $row['id_ksiazki']. '</td>';
            echo '<td>' . $row['tytul'] . '</td>';
            echo '<td>' . $row['autor'] . '</td>';
            echo '<td>' .  $row['cena']. '</td>';
            echo '<td>' .  $row['ilosc']. '</td>';
            echo '<td><form method="POST" action="removebook.php">
                    <input type="hidden" name="id_ksiazki" value="' . $row["id_ksiazki"] . '">
                    <button type="submit" name="usun" id="usun">-</button></td>';
            echo '</tr>';
        }
        mysqli_close($conn);
        ?> 
    </table>
    </main>
</body>
</html>