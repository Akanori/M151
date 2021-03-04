<?php

error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);


$servername = "80.74.150.110";
$username = "northwind";
$password = "5%wrxL66";
$database = "northwind";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die( "Connection failed: " . $e->getMessage() );
}

$isNewCustomer = true;
if ($_GET['id'] || $_POST['id']) {
    $customerId = $_GET['id'] ? $_GET['id'] : $_POST['id'];
    $isNewCustomer = false;

    $stmt = $conn->prepare('SELECT * FROM customers WHERE id = :id');
    $result = $stmt->execute(['id' => $customerId]);

    $customer = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $job_title = $_POST['job_title'];

    if ($isNewCustomer) {
        $statement = $conn->prepare(
            'INSERT INTO customers(first_name, last_name, job_title)
                     VALUES (:first_name, :last_name, :job_title)'
        );

        $statement->execute([
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':job_title' => $job_title
        ]);
    }
    else {
        $statement = $conn->prepare('
                UPDATE customers SET first_name = :first_name,
                                     last_name = :last_name,
                                     job_title = :job_title
                         WHERE id = :id
        ');

        try {
            $statement->execute(
                [
                    ':first_name' => $first_name,
                    ':last_name' => $last_name,
                    ':job_title' => $job_title,
                    ':id' => intval($_POST['id'])
                ]
            );
        }
        catch (Exception $e) {
            echo "<pre>";
            var_dump($e);
            die('ex');
        }

    }
    ?>
    Daten einfgefügt!
    <a href="index.php">Zurück zur Liste</a>
    <?php
}
?>

<form action="?" method="POST">
    <?php
        if (! $isNewCustomer) {
            echo "<input name='id' value='".$_GET['id']."' type='hidden' />";
        }
    ?>
    <input type="text" value="<?= $isNewCustomer ? '' : $customer['last_name'] ?>" name="last_name" placeholder="Last Name" />
    <input type="text" value="<?= $isNewCustomer ? '' : $customer['first_name'] ?>" name="first_name" placeholder="First Name" />
    <input type="text" value="<?= $isNewCustomer ? '' : $customer['job_title'] ?>" name="job_title" placeholder="Job Title" />
    <input type="submit" value="Absenden" />
</form>
