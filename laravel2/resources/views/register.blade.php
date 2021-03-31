<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/formStyle.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/template.css')}}">
    <title>Registrieren</title>
</head>

<body>
    <header></header>
    <h1>Registrierung</h1>

    <form action="createUser" method="POST">
        <input type="text" placeholder="Vorname" size="20" name="firstname" required="required">
        <input type="text" placeholder="Nachname" size="20" name="lastname" required="required">

        <br>

        <div class="lost">
            <input type="text" placeholder="Strasse" size="35" name="street" required="required">
            <input type="text" placeholder="Nr" size="5" name="housenumber" required="required">
        </div>

        <div class="lost">
            <input type="text" placeholder="PLZ" size="5" pattern="\d{4}" list="plz" name="zipcode" required="required">
            <datalist id="plz">
                <option value="6017">
                <option value="6030">
                <option value="6010">
                <option value="6210">
            </datalist>

            <input type="text" placeholder="Ort" size="35" pattern="[a-zA-Z]*" list="ort" name="city" required="required">
            <datalist id="ort">
                <option value="Ruswil">
                <option value="Ebikon">
                <option value="Wolhusen">
                <option value="Sursee">
            </datalist>
        </div>

        <div class="lost">
            <input type="text" placeholder="Telefohnnummer" size="15" min="0" max="150" name="telephonenumber" required="required">
            <input type="email" placeholder="Email-Adresse" size="25" name="email" required="required">
        </div>

        <div class="lost">
            <input type="password" placeholder="Passwort" size="20" min="0" max="150" name="password" required="required">
            <input type="password" placeholder="Passwort Bestätigen" size="20" name="confPassword" required="required">
        </div>

        <div class="lost">
            <button type="reset">Verwerfen</button>
            <button type="submit">Registrieren</button>
        </div>
    </form>

    <script src="{{ asset('/js/template.js')}}"></script>
</body>

</html>