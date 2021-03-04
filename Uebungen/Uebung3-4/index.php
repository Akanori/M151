<?php 
    $id = $_GET['id'];
    if($id === null){
        ?>
        <h1>Kunde Erfassen</h1>
        <?php
    }else{
        ?>
        <h1>Kunde Aktuallisieren</h1>
        <?php
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form>
        <input type="text" placeholder="Firma" size="20" name="company" required="required">
        <input type="text" placeholder="Jobtittel" size="13" name="job_title" required="required">
        <input type='hidden' name='customer_id' id='3' size="3">

        <div class="lost">
        <input type="text" placeholder="Vorname" size="20" name="first_name" required="required"> 
        <input type="text" placeholder="Nachname" size="20" name="last_name" required="required">
        </div>
    
        <div class="lost">
            <input type="text" placeholder="Strasse" size="43" name="address" required="required">
        </div>

        <div class="lost">
            <input type="text" placeholder="PLZ" size="5" pattern="\d{4}" list="plz" name="zip_postal" required="required">
            <datalist id="plz">
                <option value="6017">
                <option value="6030">
                <option value="6010">
                <option value="6210">
            </datalist>

            <input type="text" placeholder="Ort" size="35" pattern="[a-zA-Z]*" list="ort" name="state_province" required="required">
            <datalist id="ort">
                <option value="Ruswil">
                <option value="Ebikon">
                <option value="Wolhusen">
                <option value="Sursee">
            </datalist>
        </div>

        <div class="lost">
            <input type="text" placeholder="Geschäftstelefon" size="12" name="business_phone">
            <input type="text" placeholder="Privattelefon" size="12" name="mobile_phone">
            <input type="text" placeholder="Hometelefon" size="12" name="home_phone">
        </div>

        <div class="lost">
        <input type="email" placeholder="Email-Adresse" size="35" name="email_address" required="required">
        </div>

        <div class="lost einzug">
            <button type="reset">Verwerfen</button>
            <button type="submit">Senden</button>
        </div>
    </form>
</body>
</html>