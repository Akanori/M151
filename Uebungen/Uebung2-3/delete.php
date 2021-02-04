<?php
$servername = "localhost";
$username = "vmadmin";
$password = "sml12345";
$database = "northwind";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$id = $_GET['id'];

$sql = $conn->prepare("DELETE FROM invoices WHERE order_id = :id");
$sql->execute(array(':id' => $id));

$sql = $conn->prepare("DELETE FROM order_details WHERE order_id = :id");
$sql->execute(array(':id' => $id));


$sql = $conn->prepare("DELETE FROM orders WHERE id = :id");
$sql->execute(array(':id' => $id));
?>
<p>Bestellung gelöscht</p></br> 
<a href="index.php">Zurück</a>