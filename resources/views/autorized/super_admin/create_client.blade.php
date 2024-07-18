<!DOCTYPE html>
<html>
<head>
    <title>Админ Панель</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
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
                    <h1>Добро пожаловать в Админ Панель</h1>
                    <p>Ваше универсальное решение для управления клиентами и адресами</p>
                </div>

                <div class="main-content mt-4">
                    <h1>Создать Клиента</h1>

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

                    <form action="{{ route('store_client') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="last_name">Фамилия:</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}">
                        </div>
                        <div class="form-group">
                            <label for="first_name">Имя:</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}">
                        </div>
                        <div class="form-group">
                            <label for="telephone">Телефон:</label>
                            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="role_id">Роль:</label>
                            <select class="form-control" id="role_id" name="role_id">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Создать Клиента</button>
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
