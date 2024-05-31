<?php
require 'admin.php';
if(isset($_POST['imie']) && isset($_POST['nazwisko']))
{
    require 'connect.php';
    if ($conn == FALSE) 
    {
        die("Błąd połączenia z bazą danych: ");
    }
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $haslo = $_POST['haslo'];
    $miejscowosc = $_POST['miejscowosc'];
    $ulica = $_POST['ulica'];
    $nr = $_POST['nr_domu'];
    $tel = $_POST['telefon'];
    $email = $_POST['email'];
    $query = "INSERT INTO klient(Imie, Nazwisko, haslo, Miejscowosc, Ulica, Nr_domu, Telefon, AdresEmail) VALUES('$imie', '$nazwisko', '$haslo', '$miejscowosc','$ulica', '$nr', '$tel', '$email')";
    $result = mysqli_query($conn,$query);
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
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
<main>
<form action="addclient.php" method="post" id="add">
            <h2>Dodaj klienta</h2></br>
            <b>Imie:</b></br>
            <input type=text name="imie" value="" size="25" required><br/>
            <b>Nazwisko:</b></br>
            <input type=text name="nazwisko" value="" size="25" required><br/>
            <b>Email:</b></br>
            <input type=email name="email" value="" size="25" required><br/>
            <b>Haslo: </b></br>
            <input type=password name='haslo' value="" size="25" required><br/>
            <b>Miejscowość: </b></br>
            <input type=text name='miejscowosc' value="" size="25" required><br/>
            <b>Ulica: </b></br>
            <input type=text name='ulica' value="" size="6" required><br/>
            <b>Numer domu: </b></br>
            <input type=number name='nr_domu' value="" size="5" required><br/>
            <b>Telefon: </b></br>
            <input type=tel name='telefon' value="" size="9" required><br/>  
            <input type="submit" value="Dodaj">
</form>
<?php
if(isset($_POST['imie']) && isset($_POST['nazwisko']))
{
    if($result) 
    {
        echo"<br>Dodano klienta!";
    }
}
?>
</main>
</body>
</html>
