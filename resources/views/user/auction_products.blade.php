<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="form">
        <h1>Auction products</h1>

    </div>

    <div style="margin-top: 10px">
        @foreach ($auctionProducts as $product)
            <div>product name: {{ $product->product_name }}</div>
            <div>product description: {{ $product->description }}</div>
            <div>start price: {{ $product->start_price }}</div>
            <div>step price: {{ $product->step_price }}</div>
            @if ($product->winner_id == '')
                <div>No one bid yet</div>
            @else
                <?php
                $min = $product->highest_price;
                ?>
                <div>winnwer: {{ $product->winner_id }}</div>
                <div>current highet bid: {{ $product->highest_price }}</div>
            @endif
            <a href="{{ url('/bid_view/' . $product->id) }}">">Place bid</a>
        @endforeach
    </div>
</body>

</html>
