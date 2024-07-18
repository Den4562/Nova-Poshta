<!DOCTYPE html>
<html>
<head>
    <title>Создать Статус</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #343a40;
            color: white;
            padding: 20px;
            min-height: 100vh;
        }
        .sidebar a {
            color: white;
            margin: 10px 0;
            display: block;
        }
        .sidebar a:hover {
            text-decoration: none;
            color: #ffc107;
        }
        .banner {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .main-content {
            padding: 20px;
        }
        .navbar-brand {
            color: white !important;
        }
        .navbar {
            background-color: #343a40;
        }
        .form-control {
            border-radius: 0.25rem;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">Админ Панель</a>
        <div class="ml-auto d-flex align-items-center">
            <!-- Display the special label or the admin's first name -->
            @if(session('special_label'))
                <span class="nav-link text-white">{{ session('special_label') }}</span>
            @endif
            <a class="nav-link text-white" href="{{ route('orders.index') }}">Посмотреть заказы</a>
            <a class="nav-link text-white" href="{{ route('login') }}">Выйти</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <h5>Навигация</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create_client') }}">Создать Клиента</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create_country') }}">Создать Страну</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create_region') }}">Создать Регион</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create_populated_area') }}">Создать Населённый Пункт</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create_status') }}">Создать Статус</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create_order') }}">Создать Заказ</a>
                    </li>
                  
                </ul>
            </div>
            <div class="col-md-10">
                <div class="banner">
                    <h1>Создать Статус</h1>
                    <p>Введите информацию о новом статусе ниже.</p>
                </div>

                <div class="main-content mt-4">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('store_status') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Название статуса:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="region_id">Регион:</label>
                            <select class="form-control" id="region_id" name="region_id" required>
                                <option value="">Выберите регион</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Создать Статус</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS и зависимости -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
