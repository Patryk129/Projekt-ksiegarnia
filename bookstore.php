<?php
$servername = "localhost"; // Zmień, jeśli używasz innego serwera
$username = "root"; // Twoja nazwa użytkownika
$password = ""; // Twoje hasło
$dbname = "ksiegarnia";

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzanie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT tytul, concat(autor.imie,' ',autor.nazwisko) as autor2, cena, ilosc FROM ksiazki inner join autor on ksiazki.id_autora = autor.id_autora";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="book-item">';
        // echo '<img src="' . $row["image"] . '" alt="' . $row["title"] . '">';
        echo '<h3>' . $row["tytul"] . '</h3>';
        echo '<p>Autor: ' . $row["autor2"] . '</p>';
        echo '<p>Cena: ' . $row["cena"] . ' PLN</p>';
        echo '</div>';
    }
} else {
    echo "0 results";
}
$conn->close();
?>


<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ksiegarnia";

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzanie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT id, title, author, price, image FROM books";
if ($search) {
    $sql .= " WHERE title LIKE '%$search%' OR author LIKE '%$search%'";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="book-item">';
        echo '<img src="' . $row["image"] . '" alt="' . $row["title"] . '">';
        echo '<h3>' . $row["title"] . '</h3>';
        echo '<p>Autor: ' . $row["author"] . '</p>';
        echo '<p>Cena: ' . $row["price"] . ' PLN</p>';
        echo '<form method="POST" action="cart.php">';
        echo '<input type="hidden" name="book_id" value="' . $row["id"] . '">';
        echo '<button type="submit" name="add_to_cart">Dodaj do koszyka</button>';
        echo '</form>';
        echo '</div>';
    }
} else {
    echo "Brak wyników";
}
$conn->close();
?>
