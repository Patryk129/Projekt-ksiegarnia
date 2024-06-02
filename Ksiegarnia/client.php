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
        <a href="addclient.php"><button id="ad">Dodaj klienta</button></a>
    <table>
        <tr>
            <td>Id klienta</td>
            <td>Imie</td>
            <td>Nazwisko</td>
            <td>Email</td>
            <td>Hasło</td>
            <td>Telefon</td>
            <td>Miejscowość</td>
            <td>Ulica</td>
            <td>Nr domu</td>
            <td>Usun</td>
        </tr>
        <?php
        require 'connect.php';
        $query2 = "SELECT * from klient";
        $result2 = mysqli_query($conn,$query2);
        $row = mysqli_fetch_array($result2);
        while($row = mysqli_fetch_assoc($result2))
        {
            echo '<tr>';
            echo '<td>' . $row['Id_klienta']. '</td>';
            echo '<td>' . $row['Imie'] . '</td>';
            echo '<td>' . $row['Nazwisko'] . '</td>';
            echo '<td>' .  $row['AdresEmail']. '</td>';
            echo '<td>' .  $row['haslo']. '</td>';
            echo '<td>' .  $row['Telefon']. '</td>';
            echo '<td>' .  $row['Miejscowosc']. '</td>';
            echo '<td>' .  $row['Ulica']. '</td>';
            echo '<td>' .  $row['Nr_domu']. '</td>';
            echo '<td><form method="POST" action="removeklient.php">
                    <input type="hidden" name="id_klienta" value="' . $row["Id_klienta"] . '">
                    <button type="submit" name="usun" id="usun">-</button></td></form>';
            echo '</tr>';
        }
        mysqli_close($conn);
        ?> 
    </table>
    </main>
</body>
</html>
