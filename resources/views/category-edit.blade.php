<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование категории | ShopManager</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>

<body>
    <div class="admin-container">
        <div class="header">
            <div class="logo">
                <h1>🛍️ ShopManager</h1>
            </div>
            <div class="user-info">
                <span class="user-email">admin@shop.com</span>
                <a class="logout-btn" href="./index.html">Выйти</a>
            </div>
        </div>

        <nav class="nav-tabs" aria-label="Разделы админ-панели">
            <a class="tab-btn active" href="./categories.html">📂 Категории</a>
            <a class="tab-btn" href="./products.html">🏷️ Товары</a>
            <a class="tab-btn" href="./orders.html">📦 Заказы</a>
        </nav>
        <div class="card">
            <div class="card-header">
                <h2>Редактировать категорию</h2>
                <a class="btn-secondary" href="/admin/category-view">← К просмотру</a>
            </div>
            <form action="/admin/category/{{ $category->id }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="catName">Название (обяз., макс 15, кириллица, спецсимволы: пробел, тире)</label>
                    <input class="@error('title') error-input @else '' @enderror" type="text" id="catName"
                        name="title" value="Электроника" maxlength="15" required>
                    @error('title')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="catDesc">Описание (макс 50, кириллица, спецсимволы: пробел, тире, точка, запятая, :
                        ;)</label>
                    <textarea class="@error('description') error-input @else 'form-group' @enderror" id="catDesc" name="description"
                        rows="2" maxlength="50">Смартфоны, ноутбуки</textarea>
                    @error('description')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
                <div class="action-btns" style="justify-content:flex-end;">
                    <a class="btn-secondary" href="./category-view.html">Отмена</a>
                    <button type="submit" class="btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
