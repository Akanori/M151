<?php
$servername = "localhost";
$username = "vmadmin";
$password = "sml12345";
$database = "northwind";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully<br />";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>
<table>
    <tr>
        <th>Firma</th>
        <th>Nachname</th>
        <th>Vorname</th>
        <th>Beruf</th>
        <th>Bestellungen</th>
    </tr>
<?php
$sql = "SELECT * FROM customers";
foreach ($conn->query($sql) as $row) {
    ?>
    <tr>
        <td><?= $row['company']; ?></td>
        <td><?= $row['last_name']; ?></td>
        <td><?= $row['first_name']; ?></td>
        <td><?= $row['job_title']; ?></td>
        <td><a href="bestellungen.php?id=<?= $row['id']?>">-></a></td>
    </tr>
    <?php
}
?>
</table>