<h1>Pizza Konfigurator</h1>
</br>
<p>Die Pizza hat folgende Toppings:</p>

<?php
$zutatenarray = array();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $zutat = $_POST['zutat'];
        $zutatenarray[] = $zutat;

        $anzahl = count ( $zutatenarray );
        echo "<ul>";
        for ($x = 0; $x < $anzahl; $x++  )
        {
            echo "<li>$zutatenarray[$x] </li>";
        }

        echo "</ul>";
    }
?>

</br>
<form method="POST" action="?">
    <label for="zutat">Füge eine weiter Zutat hinzu:</label>
    <input type="text" name="zutat" placeholder="Zutat">
    <input type="submit" value="Absenden" />
</form>