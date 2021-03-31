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
                <th></th>
                <th></th>
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
            <td>Total:</td>
            <td>{{$total}}</td>
            </tr>
        </tbody>
    </table>
    <a href="/order"><button>Bestellen</button></a>

    <script src="{{ asset('/js/template.js')}}"></script>
</body>

</html>