<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="form">
        <h1>Add auction</h1>
        <form action="{{ url('/store_auction') }}" method="post">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                <label for="">auction name</label>
                <input type="text" name="name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="">Start time</label>
                <input type="datetime-local" name="start_time">
            </div>
            <div>
                <label for="">Close time</label>
                <input type="datetime-local" name="close_time">
            </div>
            <button type="submit">Add</button>
        </form>
        <br>
        <h1>Add product</h1>
        <form action="{{ url('/store_product') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                <label for="">product name</label>
                <input type="text" name="product_name">
                @error('product_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="">Price</label>
                <input type="number" name="price">
            </div>
            <div>
                <label for="">Image</label>
                <input type="file" name="image">
            </div>
            <div>
                <label for="">Description</label>
                <input type="text" name="description">
            </div>
            <div>
                <label for="">Auction</label>
                <select name="auction">
                    @foreach ($auctions as $auction)
                        <option value="{{ $auction->id }}">{{ $auction->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Add</button>
        </form>
    </div>

    <div class="body">
        @foreach ($auctions as $auction)
            <table>
                <thead>
                    <tr>
                        <td>auction name</td>
                        <td>start time</td>
                        <td>close time</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $auction->name }}</td>
                        <td>{{ $auction->start_time }}</td>
                        <td>{{ $auction->close_time }}</td>
                        <td>
                            <a href="{{ url('/auction_products/' . $auction->id) }}">enter auction</a><br>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endforeach
    </div>
</body>

</html>
