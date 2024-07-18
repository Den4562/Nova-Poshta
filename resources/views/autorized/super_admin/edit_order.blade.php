<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Order</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="client_id">Client:</label>
                <select class="form-control" id="client_id" name="client_id" required>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ $order->client_id == $client->id ? 'selected' : '' }}>{{ $client->full_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="countries_id">Country:</label>
                <select class="form-control" id="countries_id" name="countries_id" required>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $order->countries_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="region_id">Region:</label>
                <select class="form-control" id="region_id" name="region_id" required>
                    @foreach($regions as $region)
                        <option value="{{ $region->id }}" {{ $order->region_id == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="populated_areas_id">Populated Area:</label>
                <select class="form-control" id="populated_areas_id" name="populated_areas_id" required>
                    @foreach($populate_areas as $populated_area)
                        <option value="{{ $populated_area->id }}" {{ $order->populated_areas_id == $populated_area->id ? 'selected' : '' }}>{{ $populated_area->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="payments_id">Payment:</label>
                <select class="form-control" id="payments_id" name="payments_id" required>
                    @foreach($payments as $payment)
                        <option value="{{ $payment->id }}" {{ $order->payments_id == $payment->id ? 'selected' : '' }}>{{ $payment->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="statuses_id">Status:</label>
                <select class="form-control" id="statuses_id" name="statuses_id" required>
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}" {{ $order->statuses_id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="comentar">Comment:</label>
                <textarea class="form-control" id="comentar" name="comentar">{{ $order->comentar }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Order</button>
        </form>
    </div>
</body>
</html>
