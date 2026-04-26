<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр товара | ShopManager</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
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
            <a class="tab-btn" href="/admin/categories">📂 Категории</a>
            <a class="tab-btn active" href="/admin/products">🏷️ Товары</a>
            <a class="tab-btn" href="./orders.html">📦 Заказы</a>
        </nav>

        <div class="card">
            <div class="card-header">
                <h2>Товар: Смартфон X</h2>
                <div class="action-btns">
                    <a class="btn-secondary" href="/admin/products">← К списку</a>
                    <a class="btn-primary" href="/admin/product-edit/{{ $product->id }}">✏️ Редактировать</a>
                </div>
            </div>
            <table class="data-table" aria-label="Информация о товаре">
                <tbody>
                    <tr>
                        <th style="width:220px; background:#f9fafb;">ID</th>
                        <td>{{ $product->id }}</td>
                    </tr>
                    <tr>
                        <th style="background:#f9fafb;">Название</th>
                        <td>{{ $product->title }}</td>
                    </tr>
                    <tr>
                        <th style="background:#f9fafb;">Описание</th>
                        <td>{{ mb_strlen($product->description) == 0 ? '-' : $product->description }}</td>
                    </tr>
                    <tr>
                        <th style="background:#f9fafb;">Цена</th>
                        <td>{{ $product->price }}</td>
                    </tr>
                    <tr>
                        <th style="background:#f9fafb;">Категория</th>
                        <td><a href="/admin/category-view/{{ $category->id }}">{{ $category->title }}</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>Изображения</h2>
                <span class="badge">демо</span>
            </div>
            <div class="image-preview-grid">
                @foreach ($product->images as $image)
                    <img class="thumb-img" alt="Изображение 1" src="http://localhost:8000/storage/{{ $image->path }}">
                @endforeach
            </div>
            <div style="font-size:12px; margin-top:12px; color:#6c757d;">
                * В backend-версии: водяной знак "Shop" и миниатюры 300x300
            </div>
        </div>
    </div>
</body>

</html>
