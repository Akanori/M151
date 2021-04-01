<html>

<head>
    <title>Alle Produkte</title>
    <link rel="stylesheet" href="{{ asset('/css/template.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/cart.css')}}">
</head>

<body>
    <header></header>

    <table>
        <thead>
            <tr>
                <th>Datum</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{$order -> created_at}}</td>
                <td>{{$order -> total}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <table>
    <tr>
    <td>Zahlungsart:</td>
    <td>Rechnung</td>
    </tr>
    <tr></tr>
    <tr>
    <td><h2>Lieferadresse</h2></td>
    </tr>
    <tr>
    <td>Name:</td>
    <td>{{$user -> lastname}}</td>
    </tr>
    <tr>
    <td>Vorname:</td>
    <td>{{$user -> firstname}}</td>
    </tr>
    <tr>
    <td>Email:</td>
    <td>{{$user -> email}}</td>
    </tr>
    <tr>
    <td>Telefonnummer:</td>
    <td>{{$user -> telephonenumber}}</td>
    </tr>
    <tr>
    <td>Adresse:</td>
    <td>{{$user -> street}} {{$user -> housenumber}}</td>
    </tr>
    <tr>
    <td>PLZ:</td>
    <td>{{$user -> zipcode}}</td>
    </tr>
    <tr>
    <td>Ort:</td>
    <td>{{$user -> city}}</td>
    </tr>
    <tr></tr>
    </table>

    <script src="{{ asset('/js/template.js')}}"></script>
</body>

</html>