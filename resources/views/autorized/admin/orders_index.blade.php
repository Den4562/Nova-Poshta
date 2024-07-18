<!DOCTYPE html>
<html>
<head>
    <title>Admin Orders List</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            color: white;
        }
        .alert-success {
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex align-items-center mb-4">
            <h1 class="h3">Orders List</h1>
           
            <a class="btn btn-custom" style="margin-left: 600px" href="{{ route('admin.orders.create') }}" >Создать новый заказ</a>
            <a  class="btn btn-custom" style="margin-left: 50px" href="{{ route('admin_create_country') }}">Вернутся</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>TTN</th>
                        <th>Client</th>
                        <th>Country</th>
                        <th>Region</th>
                        <th>Populated Area</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Comment</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->ttn }}</td>
                            <td>{{ $order->client->full_name }}</td>
                            <td>{{ $order->country->name }}</td>
                            <td>{{ $order->region->name }}</td>
                            <td>{{ $order->populatedArea->name }}</td>
                            <td>{{ $order->payment->name }}</td>
                            <td>{{ $order->status->name }}</td>
                            <td>{{ $order->comentar }}</td>
                            <td class="d-flex">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm mr-2">View</a>
                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
