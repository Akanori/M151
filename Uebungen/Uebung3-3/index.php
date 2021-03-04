<?php
require 'db.php';
$db = DB::get();

?>
<a href="create.php">Erstellen</a>

<table>
    <tr>
        <th>Firma</th>
        <th>Nachname</th>
        <th>Vorname</th>
        <th>Beruf</th>
        <th>Bestellungen</th>
        <th>Bearbeiten</th>
    </tr>
<?php
$custommers = $db->select("SELECT * FROM customers", null);
foreach ($custommers as $row) {
    ?>
    <tr>
        <td><?= $row['company']; ?></td>
        <td><?= $row['last_name']; ?></td>
        <td><?= $row['first_name']; ?></td>
        <td><?= $row['job_title']; ?></td>
        <td><a href="bestellungen.php?id=<?= $row['id']?>">-></a></td>
        <td><a href="create.php?id=<?= $row['id']?>">Bearbeiten</a></td>

    </tr>
    <?php
}
?>
</table>