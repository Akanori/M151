<html>

<head>
    <title>Detailseite</title>
    <link rel="stylesheet" href="{{ asset('/css/products.css')}}">
</head>

<body>
    <div class="content">
        <div class="row">
            <div class="columndetail">
                <div class="card carddetail right">
                    <img src="{{$product->image}}" alt="{{$product->name}}" class="card-img-top">
                    <p id="normalprice">{{ $product->price }}Fr.</p>
                    <button onclick="">Zum Warenkorb</button>
                </div>
            </div>
            <div class="columndetail">
                <div class="card carddetail">
                    <h1>{{$product->name}}</h1>
                    <h4>Beschreibung</h4>
                    <p>{{$product->details}}</p>
                    <h4>Anleitung</h4>
                    <p>{{$product->manual}}</p>
                </div>
            </div>
        </div>
    </div>

</html>