<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация | ShopManager</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>

<body>

    <div class="login-wrapper">
        <div class="login-header">
            <h2>🔐 Вход в админ-панель</h2>
            <p>Введите email и пароль</p>
        </div>

        <form action="/admin/auth" method="POST">
            @csrf
            <div class="form-group">
                <label for="loginEmail">Email</label>
                <input class="@error('email') error-input @else '' @enderror" type="email" id="loginEmail"
                    name="email" placeholder="admin@shop.com" value="admin@shop.com" required>
                @error('email')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="loginPassword">Пароль</label>
                <input class="@error('password') error-input @else '' @enderror" type="password" id="loginPassword"
                    name="password" placeholder="пароль" required>
                @error('password')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn-primary" style="width:100%">Войти</button>
            </div>
            <div style="font-size:12px; margin-top:20px; text-align:center; color:#6c757d;">
                Демо-данные по ТЗ: admin@shop.com / shop2015
            </div>
            @error('auth')
                <span class="error-text">{{ $message }}</span>
            @enderror
        </form>
    </div>
</body>

</html>
