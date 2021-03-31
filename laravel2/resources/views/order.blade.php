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
                <th>Produkt</th>
                <th></th>
                <th>Preis</th>
                <th>Anzahl</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $product)
            <tr>
                <td><a href="/product/{{ $product->id }}"> <img src="{{$product->image}}" alt="{{$product->name}}" class="avatar"></a></td>
                <td>{{$product -> name}}</td>
                <td>{{$product -> price}}</td>
                <td>{{$product -> count}}</td>
                <td>{{$product -> price * $product -> count}}</td>
            </tr>
            @endforeach
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Lieferkosten:</td>
            <td>0</td>
            </tr>
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Total:</td>
            <td>{{$total}}</td>
            </tr>
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

    <a href="/completeOrder"><button>Bestellen</button></a>

    <script src="{{ asset('/js/template.js')}}"></script>
</body>

</html>