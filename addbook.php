<?php
require 'admin.php';
if(isset($_POST['tytul']))
{
    require 'connect.php';
    $tytul = $_POST['tytul'];
    $id_autora = $_POST['id_autora'];
    $cena = $_POST['cena'];
    $ilosc = $_POST['ilosc']; 
    $opis = $_POST['opis'];
    $query = "INSERT INTO ksiazki(tytul,id_autora,cena,Ilosc,opis) VALUES('$tytul','$id_autora','$cena','$ilosc','$opis')";
    $result = mysqli_query($conn,$query);
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
        <a href="ksiazka.php"><button class="menu">Zarządzaj książkami</button></a>
    </aside>
<main>
<form action="addbook.php" method="post" id="add2">
            <h2>Dodaj książkę</h2></br>
            <b>Tytuł:</b></br>
            <input type=text name="tytul" value="" size="25"><br/>
            <b>Id autora:</b></br>
            <input type=text name="id_autora" value="" size="25"><br/>
            <b>Cena:</b></br>
            <input type=number name="cena" value=""><br/>
            <b>ilosc: </b></br>
            <input type=number name='ilosc' value=""><br/>
            <b>Opis: </b></br>
            <input type=text name='opis' value="" size="255"><br/>
            <input type="submit" value="Dodaj">
</form>
<?php
if(isset($_POST['tytul']))
{
    if($result) 
    {
        echo"<br>Dodano książkę!";
    }
}
?>
</main>
</body>
</html>
