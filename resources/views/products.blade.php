<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары | ShopManager</title>
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
            <a class="tab-btn active" href="/admin/products?page=1">🏷️ Товары</a>
            <a class="tab-btn" href="./orders.html">📦 Заказы</a>
        </nav>
        <div class="panel">
            <div class="card">
                <div class="card-header">
                    <h2>Список товаров</h2>
                    <a class="btn-primary" href="/admin/product-create">➕ Новый товар</a>
                </div>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Изобр.</th>
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td><img src="http://localhost:8000/storage/{{ $product->images[0]->path }}"
                                        alt="Смартфон X" width="50" class="thumb-img"></td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->price }}</td>
                                <td class="action-btns">
                                    <a class="btn-secondary" href="/admin/product-view/{{ $product->id }}">👁️</a>
                                    <a class="btn-secondary" href="/admin/product-edit/{{ $product->id }}">✏️</a>
                                    <form action="/admin/product/{{ $product->id }}" method="post">
                                        @method('DELETE')
                                        <button class="btn-danger">🗑️</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination" aria-label="Пагинация (демо)">
                    <a class="page-link" href="/admin/products?page=1">1</a>
                    <a class="page-link" href="/admin/products?page=2">2</a>
                    <a class="page-link" href="/admin/products?page=3">3</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
