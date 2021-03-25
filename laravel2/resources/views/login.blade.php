<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/formStyle.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/template.css')}}">
    <title>Login</title>
</head>

<body>
    <header></header>
    <h1>Login</h1>

    <form action="loginUser" method="POST">
        <input type="email" placeholder="Email-Adresse" size="20" name="email" required="required">

        <div class="lost">
            <input type="password" placeholder="Passwort" size="20" min="0" max="150" name="password" required="required">
        </div>

        <div class="lost einzug">
            <button type="submit">Anmelden</button>
        </div>
    </form>

    <script src="{{ asset('/js/template.js')}}"></script>
</body>

</html>