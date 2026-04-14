<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Catálogo Essential Nutrition</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: proxima-nova, sans-serif; font-size: 14px; -apple-system, sans-serif; background: #f5f6fa; color: #333; }
        .container { max-width: 600px; margin: 40px auto; padding: 0 20px; }
        nav { background: #141414; padding: 16px 0; }
        nav .container { display: flex; gap: 24px; align-items: center; }
        nav a { color: #e0e0e0; text-decoration: none; font-size: 14px; }
        nav a:hover { color: #fff; }
        nav .brand { font-weight: 700; font-size: 16px; color: #fff; }
        h1 { font-size: 24px; margin-bottom: 24px; }
        .card { background: #fff; border-radius: 8px; padding: 32px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: 600; margin-bottom: 6px; font-size: 14px; }
        input, select, textarea {
            width: 100%; padding: 10px 12px; border: 1px solid #ddd; border-radius: 6px;
            font-size: 14px; font-family: inherit;
        }
        textarea { resize: vertical; min-height: 80px; }
        input:focus, select:focus, textarea:focus { outline: none; border-color: #4a6cf7; }
        .btn {
            background: #141414; color: #fff; border: none; padding: 12px 24px;
            border-radius: 6px; font-size: 14px; font-weight: 600; cursor: pointer;
        }
        .btn:hover { opacity: .85 }
        .alert-success {
            background: #d4edda; color: #155724; padding: 12px 16px;
            border-radius: 6px; margin-bottom: 20px; font-size: 14px;
        }
    </style>
</head>
<body>
    <nav>
        <div class="container">
            <span class="brand">Essential Nutrition</span>
            <a href="{{ route('categories.create') }}">Nova Categoria</a>
            <a href="{{ route('products.create') }}">Novo Produto</a>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
