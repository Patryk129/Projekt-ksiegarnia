<?php
session_start();
require 'connect.php';
$id_klienta = $_SESSION['log'];
$id_ksiazki = $_POST['id_ksiazki'];
$query1 = "UPDATE ksiazki set ilosc = ilosc+1 where id_ksiazki = $id_ksiazki";
    mysqli_query($conn,$query1);
$query = "SELECT liczba_egz, ksiazki.id_ksiazki, tytul, z.id_zamowienia,
    concat(autor.imie,' ',autor.nazwisko)
    FROM zamowieniee z
    inner join zamowione_produkty zp on z.id_zamowienia = zp.id_zamowienia 
    inner join ksiazki on zp.id_produktu = ksiazki.id_ksiazki 
    inner join autor on ksiazki.id_autora = autor.id_autora
    WHERE z.id_klienta = $id_klienta 
    AND liczba_egz > 0 and data_zlozenia_zamowienia IS NULL";
$result = mysqli_query($conn,$query);
$rows = mysqli_fetch_array($result);
if($rows['liczba_egz'] == 1)
{
    $zam = $rows['id_zamowienia'];
    // $query = "DELETE FROM zamowienie WHERE id_zamowienia = $zam";
    $query = "DELETE FROM zamowieniee WHERE id_zamowienia = $zam";
    $result = mysqli_query($conn,$query);
}
else
{
    $zam = $rows['id_zamowienia'];
    $legz = $rows['liczba_egz'] - 1;
    $query = "UPDATE zamowione_produkty set liczba_egz = $legz WHERE id_zamowienia = $zam AND id_produktu = $id_ksiazki";
    $result = mysqli_query($conn,$query);
}
header("Location: zamowienie.php");
exit();
?>
