<?php
if(isset($_POST['imie']))
{
    require 'connect.php';
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
    $mysqli_close($conn);
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/register.css">
</head>
<body>
    <?php require 'header3.php'; ?>
    <div>
        <form action="registration.php" method="post">
            <div id="rejestracja"><b>Rejestracja</b></div></br>
            <b>Imie:</br>
            <input type=text name="imie" value="" size="25" required><br/>
            Nazwisko:</br>
            <input type=text name="nazwisko" value="" size="25" required><br/>
            Email:</br>
            <input type=email name="email" value="" size="25" required><br/>
            Haslo: </br>
            <input type=password name='haslo' value="" size="25" required><br/>
            Miejscowość: </br>
            <input type=text name='miejscowosc' value="" size="25" required><br/>
            Ulica: </br>
            <input type=text name='ulica' value="" size="6" required><br/>
            Numer domu: </br>
            <input type=number name='nr_domu' value="" size="5" required><br/>
            Telefon: </b></br>
            <input type=text name='telefon' value="" size="9" required><br/>
            <input type="submit" value="Zarejestruj sie">
        </form>
    </div>
</body>
</html>