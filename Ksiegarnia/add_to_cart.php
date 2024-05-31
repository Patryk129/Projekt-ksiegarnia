<?php
session_start();
if (isset($_POST['id_ksiazki'])) {
    $id_ksiazki = $_POST['id_ksiazki'];
    require 'connect.php';
    $id_klienta = $_SESSION['log']; 
    $query1 = "UPDATE ksiazki set ilosc = ilosc-1 where id_ksiazki = $id_ksiazki";
    mysqli_query($conn,$query1);
    $query = "SELECT id_produktu, liczba_egz from zamowione_produkty inner join zamowieniee on zamowione_produkty.id_zamowienia = zamowieniee.id_zamowienia where id_klienta = $id_klienta and data_zlozenia_zamowienia is null";
    $result = mysqli_query($conn,$query);
    while($row = $result->fetch_assoc())
    {
        echo $row['id_produktu'];
        if($id_ksiazki == $row['id_produktu'])
        {
            $legz = $row['liczba_egz']+1;
            $query2 = "UPDATE zamowione_produkty set liczba_egz = $legz where id_produktu = $id_ksiazki";
            $result = mysqli_query($conn,$query2);
            $conn->close();
            header('Location: index.php');
            exit();
            break;
        
        }
    }
    $query2 = "INSERT INTO zamowieniee (id_klienta) VALUES ('$id_klienta')";
    $result2 = mysqli_query($conn,$query2);

    $id_zamowienia = $conn->insert_id;

    $query3 = "INSERT INTO zamowione_produkty (id_zamowienia, id_produktu, liczba_egz)
        VALUES ($id_zamowienia, $id_ksiazki, 1)";
    $result3 = mysqli_query($conn,$query3);
    mysqli_close($conn); 
}

header('Location: index.php');
exit();

?>