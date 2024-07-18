<!DOCTYPE html>
<html>
<head>
    <title>View Order</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>View Order</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Order #{{ $order->id }}</h5>
                <p class="card-text">TTN: {{ $order->ttn }}</p>
                <p class="card-text">Client: {{ $order->client->full_name }}</p>
                <p class="card-text">Country: {{ $order->country->name }}</p>
                <p class="card-text">Region: {{ $order->region->name }}</p>
                <p class="card-text">Populated Area: {{ $order->populatedArea->name }}</p>
                <p class="card-text">Payment: {{ $order->payment->name }}</p>
                <p class="card-text">Status: {{ $order->status->name }}</p>
                <p class="card-text">Comment: {{ $order->comentar }}</p>
                <a href="{{ route('orders.index') }}" class="btn btn-primary">Back to Orders List</a>
            </div>
        </div>
    </div>
</body>
</html>
