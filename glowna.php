<?php
session_start();
if(!isset($_SESSION['log']))
{
    header('location:loguj2.php');
    exit();
}
$conn = mysqli_connect('localhost', 'root', '', 'ksiegarnia');

if ($conn == FALSE) 
{
    die("Błąd połączenia z bazą danych: ");
}

// Inicjalizacja zmiennej, która będzie przechowywać wyniki wyszukiwania
// $search_results = array();

// Obsługa wyszukiwania po fragmencie tytułu
if (isset($_POST['search'])) 
{
    $search_term = $_POST['search'];
    $query = "SELECT id_ksiazki, tytul, concat(autor.imie,' ',autor.nazwisko) as autor2, cena, ilosc, opis FROM ksiazki inner join autor on ksiazki.id_autora = autor.id_autora WHERE tytul LIKE '$search_term%'";
    $result = mysqli_query($conn,$query);

    // if (mysqli_num_rows($result) > 0) 
    // {
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $search_results[] = $row;
    //     }
    // } else 
    // {
    //     // echo "Brak wyników dla wyszukiwanego fragmentu tytułu: $search_term";
    // }
}
else
{
    $query = "SELECT id_ksiazki, tytul, concat(autor.imie,' ',autor.nazwisko) as autor2, cena, ilosc, opis FROM ksiazki inner join autor on ksiazki.id_autora = autor.id_autora";
    $result = mysqli_query($conn,$query);
    // if (mysqli_num_rows($result) > 0) 
    // {
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $search_results[] = $row;
    //     }
    // }
}

// Zamknięcie połączenia z bazą danych
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* form[id="wyszukiwarka"]{
            margin-left:40%;  
            width:50%;
            float: left;
        }
        #okno{
            width: 50%;
        }
        #zamowienie{
            float:left;
        } */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}
        .container {
            /* flex: 1; */
        /* width: 80%; */
        /* margin: auto; */
        /* overflow: hidden; */
        display: flex;
    flex-direction: row;
    align-items: center;
        }
header {
    background: #333;
    color: #fff;
    /* padding-top: 30px; */
    /* min-height: 70px; */
    border-bottom: #0779e4 3px solid;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    width: 100%;
    padding: 1.5rem 10%;
}

header a {
    color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 16px;
}

header ul {
    padding: 0;
    list-style: none;
}

header li {
    display: inline;
    padding: 0 20px 0 20px;
}

header h1 {
    /* float: left; */
    /* width: 500px; */
}
nav {
    /* flex: 1; */
    /* float: right; */
    /* margin-top: 10px; */
}

header form {
    /* float: right; */
    /* float:left; */
    /* position:absolute; */
    /* margin-top: 25px; */
    /* margin-left:600px; */
    /* width:200px; */
    /* margin-left:50px; */
}

header input[type="text"] {
    padding: 5px;
    font-size: 16px;
}

header input[type="submit"] {
    padding: 5px 10px;
    background: #0779e4;
    border: none;
    color: #fff;
    cursor: pointer;
}
.book-item {
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    flex: 1 1 calc(33.333% - 40px);
    box-sizing: border-box;
    position: relative;
    flex-wrap: wrap;
}

.book-item img {
    max-width: 10%;
    height: auto;
}

.book-item h3 {
    margin: 0;
}

.book-item .add-to-cart {
    background: #0779e4;
    color: #fff;
    padding: 10px;
    text-align: center;
    margin-top: 10px;
    text-decoration: none;
    display: block;
}
.book-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}
button{
    padding: 5px 10px;
    background: #0779e4;
    border: none;
    color: #fff;
    cursor: pointer;
}
main {
    padding: 1rem 10%;
}
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Księgarnia Internetowa</h1>

        </div>
        <form action="index.php" method="post" id="search">
            <input type="text" name="search" id="wyszukiwarka">
            <input type="submit" value="Szukaj">
        </form>
        <nav>
            <ul>
                <!-- <li></li> -->
                <li><a href="zamowienie.php">Zamowienie 
                    <!-- (<?php echo isset($_SESSION['koszyk']) ? count($_SESSION['koszyk']) : 0; ?>) -->
                </a></li>
                <li><a href="wyloguj.php" id="wyloguj">Wyloguj</a></li>
            </ul>
        </nav>
    </header>
    <!-- <a href="przegladajzasoby.php"><button>Wyszukaj</button></a>-->
    <!-- <form action="index.php" method="post" id="search">
        Wyszukaj tytuł:
        <input type="text" name="search" id="wyszukiwarka">
        <input type="submit" value="Szukaj">
        </form>
    <a href="zamowienie.php" id="zamowienie"><button>Złóż zamówienie</button></a>
    <a href="wyloguj.php"id="wyloguj"><button>Wyloguj</button></a> -->
    <main>
        <div class="book-list">
            <?php //if(!empty($search_results))

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) 
                    {
                        echo '<div class="book-item">';
                        echo '<img src="' . $row["opis"] . '" alt="' . $row["opis"] . '">';
                        echo '<h3>' . $row["tytul"] . '</h3>';
                        echo '<p>Autor: ' . $row["autor2"] . '</p>';
                        echo '<p>Cena: ' . $row["cena"] . ' PLN</p>';
                        echo '<form method="POST" action="add_to_cart.php">';
                        echo '<input type="hidden" name="id_ksiazki" value="' . $row["id_ksiazki"] . '">';
                        echo '<button type="submit" name="add_to_cart">Dodaj do koszyka</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
    </main>
</body>
</html>