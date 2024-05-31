<?php
$conn = mysqli_connect('localhost', 'root', '', 'ksiegarnia');

if ($conn == FALSE) 
{
    die("Błąd połączenia z bazą danych: ");
}

// Inicjalizacja zmiennej, która będzie przechowywać wyniki wyszukiwania
$search_results = array();

// Obsługa wyszukiwania po fragmencie tytułu
if (isset($_POST['search'])) 
{
    $search_term = $_POST['search'];
    $query = "SELECT * FROM ksiazki WHERE tytul LIKE '%$search_term%'";
    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result) > 0) 
    {
        while ($row = mysqli_fetch_assoc($result)) {
            $search_results[] = $row;
        }
    } else 
    {
        echo "Brak wyników dla wyszukiwanego fragmentu tytułu: $search_term";
    }
}
else
{
    $query = "SELECT * FROM ksiazki";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0) 
    {
        while ($row = mysqli_fetch_assoc($result)) {
            $search_results[] = $row;
        }
    }
}

// Zamknięcie połączenia z bazą danych
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Przeglądaj zasoby</title>
    <style>
        #title{
            width:30%;
            float:left;
            
        }
        form{
            margin-left:40%;  
            width:50%;
            float: left;
        }
        a{

        }
    </style>
</head>
<body>
    <!-- <div id='title'><h2>Przeglądaj zasoby</h2></div> -->
    
        <form action="przegladajzasoby.php" method="post">
        Wyszukaj tytuł:
        <input type="text" name="search" id="search">
        <input type="submit" value="Szukaj">
        </form>
        <a href="startowa.html">Powrót do strony startowej</a>
    <div id="results">
    <?php //if(!empty($search_results))
    {
        echo "<h2>Wyniki wyszukiwania:</h2>";
        echo "<ul>";
        foreach($search_results as $book)
        {
            echo "<li>".$book['tytul']."</li>";
        }
        echo "</ul>";
    }
    ?>
    </div>
    
</body>
</html>
