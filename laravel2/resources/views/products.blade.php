<html>

<head>
    <title>Alle Produkte</title>
    <link rel="stylesheet" href="{{ asset('/css/products.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/template.css')}}">
</head>

<body>
    <header></header>

    <div class="content">
        <div class="row">
            @foreach ($products as $product)
            <div class="column">
                <div class="card">
                    <a href="/product/{{ $product->id }}"> <img src="{{$product->image}}" alt="{{$product->name}}" class="card-img-top"></a>
                    <p id="name">{{$product -> name}}</p>
                    <p id="specialprice">{{$product -> price}} Fr.</p>
                    <a href="/addtocart/{{ $product->id }}"><button>Zum Warenkorb</button></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('/js/template.js')}}"></script>
</body>

</html>