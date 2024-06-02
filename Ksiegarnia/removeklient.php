<?php
    require 'admin.php';
    require 'connect.php';
    $id = $_POST['id_klienta']; 
    $query= "DELETE FROM klient WHERE id_klienta = '$id' ";
    $result = mysqli_query($conn,$query);
    mysqli_close($conn);
    header('location: client.php');
    exit;
?>
