<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание категории | ShopManager</title>
    <link rel="stylesheet" href={{ asset('styles.css') }}>
</head>

<body>
    <div class="admin-container">
        <div class="header">
            <div class="logo">
                <h1>🛍️ ShopManager</h1>
            </div>
            <div class="user-info">
                <span class="user-email">{{ auth()->user()->email }}</span>
                <form action="/admin/logout" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">Выйти</button>
                </form>
            </div>
        </div>

        <nav class="nav-tabs" aria-label="Разделы админ-панели">
            <a class="tab-btn active" href="/admin/category-view">📂 Категории</a>
            <a class="tab-btn" href="/admin/products">🏷️ Товары</a>
            <a class="tab-btn" href="/admin/orders">📦 Заказы</a>
        </nav>

        <div class="card">
            <div class="card-header">
                <h2>Создать категорию</h2>
                <a class="btn-secondary" href="./categories.html">← К списку</a>
            </div>

            <form action="/admin/category" method="post">
                <div class="form-group">
                    <label for="catName">Название (обяз., макс 15, кириллица, спецсимволы: пробел, тире)</label>
                    <input class="@error('title') error-input @else '' @enderror" type="text" id="catName"
                        name="title" placeholder="Пример: Смартфоны" maxlength="15" required>
                    @error('title')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="catDesc">Описание (макс 50, кириллица, спецсимволы: пробел, тире, точка, запятая, :
                        ;)</label>
                    <textarea id="catDesc" name="description" rows="2" placeholder="Описание" maxlength="50"></textarea>
                    @error('description')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="action-btns" style="justify-content:flex-end;">
                    <a class="btn-secondary" href="./categories.html">Отмена</a>
                    <button type="submit" class="btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
