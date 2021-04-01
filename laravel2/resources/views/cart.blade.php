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
                <td><a href="/product/{{ $product->id }}"><img src="{{$product->image}}" alt="{{$product->name}}" class="avatar"></a></td>
                <td>{{$product -> name}}</td>
                <td>{{$product -> price}}</td>
                <td><input type="number" value="{{$product -> count}}" min="0" onchange='updateCart("{{$product -> id}}", this.value)'></td>
                <td>{{ $product -> price * $product -> count }}</td>
                <td>
                    <a href="/updateCart/{{ $product -> id }}/0">
                        <svg id="fi_2089743" enable-background="new 0 0 515.556 515.556" height="20" viewBox="0 0 515.556 515.556" width="20" xmlns="http://www.w3.org/2000/svg">
                            <path d="m64.444 451.111c0 35.526 28.902 64.444 64.444 64.444h257.778c35.542 0 64.444-28.918 64.444-64.444v-322.222h-386.666z"></path>
                            <path d="m322.222 32.222v-32.222h-128.889v32.222h-161.111v64.444h451.111v-64.444z"></path>
                        </svg>
                    </a>
                </td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="bold">Total:</td>
                <td>{{$total}}</td>
            </tr>
        </tbody>
    </table>
    <a href="/order"><button>Bestellen</button></a>
    <a href="/emptyCart"><button>Wahrenkorb leeren</button></a>

    <script src="{{ asset('/js/template.js')}}"></script>
    <script src="{{ asset('/js/updateCart.js')}}"></script>
</body>

</html>