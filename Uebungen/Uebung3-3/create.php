<?php

error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

require 'db.php';
$db = DB::get();

$isNewCustomer = true;
if ($_GET['id'] || $_POST['id']) {
    $customerId = $_GET['id'] ? $_GET['id'] : $_POST['id'];
    $isNewCustomer = false;

    $customer = $db->select('SELECT * FROM customers WHERE id = :id', ['id' => $customerId]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $job_title = $_POST['job_title'];
    $company = $_POST['company'];
    $address = $_POST['address'];
    $zip_postal = $_POST['zip_postal'];
    $state_province = $_POST['state_province'];
    $business_phone = $_POST['business_phone'];
    $mobile_phone = $_POST['mobile_phone'];
    $home_phone = $_POST['home_phone'];
    $email_address = $_POST['email_address'];


    if ($isNewCustomer) {
        $statement = $conn->prepare(
            'INSERT INTO customers(first_name, last_name, job_title, company, address, zip_postal, state_province, business_phone, mobile_phone, home_phone, email_address)
                     VALUES (:first_name, :last_name, :job_title, :company, :address, :zip_postal, :state_province, :business_phone, :mobile_phone, :home_phone, :email_address)'
        );

        $statement->execute([
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':job_title' => $job_title,
            ':company' => $company, 
            ':address' => $address, 
            ':zip_postal' => $zip_postal, 
            ':state_province' => $state_province, 
            ':business_phone' => $business_phone, 
            ':mobile_phone' => $mobile_phone, 
            ':home_phone' => $home_phone, 
            ':email_address' => $email_address
        ]);
    }
    else {
        $statement = $conn->prepare('
                UPDATE customers SET first_name = :first_name,
                                     last_name = :last_name,
                                     job_title = :job_title,
                                     company = :company,
                                     address = address,
                                     zip_postal = :zip_postal,
                                     state_province = :state_province,
                                     business_phone = :business_phone,
                                     mobile_phone = :mobile_phone,
                                     home_phone = :home_phone,
                                     email_address = :email_address


                         WHERE id = :id
        ');

        try {
            $statement->execute(
                [
                    ':first_name' => $first_name,
                ':last_name' => $last_name,
                ':job_title' => $job_title,
                ':company' => $company, 
                ':address' => $address, 
                ':zip_postal' => $zip_postal, 
                ':state_province' => $state_province, 
                ':business_phone' => $business_phone, 
                ':mobile_phone' => $mobile_phone, 
                ':home_phone' => $home_phone, 
                ':email_address' => $email_address,
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
    <input type="text" placeholder="Firma" size="20" name="company" required="required" value="<?= $isNewCustomer ? '' : $customer['company'] ?>">
        <input type="text" placeholder="Jobtittel" size="13" name="job_title" required="required" value="<?= $isNewCustomer ? '' : $customer['job_title'] ?>">
        <input type='hidden' name='customer_id' id='3' size="3">

        <div class="lost">
        <input type="text" placeholder="Vorname" size="20" name="first_name" required="required" value="<?= $isNewCustomer ? '' : $customer['first_name'] ?>"> 
        <input type="text" placeholder="Nachname" size="20" name="last_name" required="required" value="<?= $isNewCustomer ? '' : $customer['last_name'] ?>">
        </div>
    
        <div class="lost">
            <input type="text" placeholder="Strasse" size="43" name="address" required="required" value="<?= $isNewCustomer ? '' : $customer['address'] ?>">
        </div>

        <div class="lost">
            <input type="text" placeholder="PLZ" size="5" pattern="\d{4}" list="plz" name="zip_postal" required="required" value="<?= $isNewCustomer ? '' : $customer['zip_postal'] ?>">
            <datalist id="plz">
                <option value="6017">
                <option value="6030">
                <option value="6010">
                <option value="6210">
            </datalist>

            <input type="text" placeholder="Ort" size="35" pattern="[a-zA-Z]*" list="ort" name="state_province" required="required" value="<?= $isNewCustomer ? '' : $customer['state_province'] ?>">
            <datalist id="ort">
                <option value="Ruswil">
                <option value="Ebikon">
                <option value="Wolhusen">
                <option value="Sursee">
            </datalist>
        </div>

        <div class="lost">
            <input type="text" placeholder="Geschäftstelefon" size="12" name="business_phone" value="<?= $isNewCustomer ? '' : $customer['business_phone'] ?>">
            <input type="text" placeholder="Privattelefon" size="12" name="mobile_phone" value="<?= $isNewCustomer ? '' : $customer['mobile_phone'] ?>">
            <input type="text" placeholder="Hometelefon" size="12" name="home_phone" value="<?= $isNewCustomer ? '' : $customer['home_phone'] ?>">
        </div>

        <div class="lost">
        <input type="email" placeholder="Email-Adresse" size="35" name="email_address" required="required" value="<?= $isNewCustomer ? '' : $customer['email_address'] ?>">
        </div>

        <div class="lost einzug">
            <button type="reset">Verwerfen</button>
            <button type="submit">Senden</button>
        </div>
</form>
