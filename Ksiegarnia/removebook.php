<?php
    require 'admin.php';
    require 'connect.php';
    $id = $_POST['id_ksiazki']; 
    $query= "DELETE FROM ksiazki WHERE id_ksiazki = '$id' ";
    $result = mysqli_query($conn,$query);
    mysqli_close($conn);
    header('book.php');
    exit;
?>