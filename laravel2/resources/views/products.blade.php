<html>

<head>
    <title>Alle Produkte</title>
    <link rel="stylesheet" href="{{ asset('/css/products.css')}}">
</head>

<body>
    <div class="content">
        <div class="row">
            @foreach ($products as $product)
            <div class="column">
                <div class="card">
                    <a href="/product/{{ $product->id }}"> <img src="{{$product->image}}" alt="{{$product->name}}" class="card-img-top"></a>
                    <p id="name">{{$product -> name}}</p>
                    <p id="specialprice">{{$product -> price}} Fr.</p>
                    <button onclick="">Zum Warenkorb</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>