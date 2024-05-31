<?php
    require 'connect.php';
    $id_klienta = $_POST['id_klienta'];
    echo $id_klienta;
    $query = "UPDATE zamowieniee 
    SET zamowieniee.oplacone = True, zamowieniee.data_zlozenia_zamowienia = CURRENT_DATE() 
    WHERE id_klienta = $id_klienta";
    $result = mysqli_query($conn,$query);
    mysqli_close($conn);
?>