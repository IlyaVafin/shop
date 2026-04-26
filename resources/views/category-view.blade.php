<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр категории | ShopManager</title>
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
            <a class="tab-btn active" href="/admin/categories">📂 Категории</a>
            <a class="tab-btn" href="/admin/products">🏷️ Товары</a>
            <a class="tab-btn" href="./orders.html">📦 Заказы</a>
        </nav>
        <div>
            <div class="card">
                <div class="card-header">
                    <h2>{{ $category->title }}</h2>
                    <div class="action-btns">
                        <a class="btn-secondary" href="/admin/categories">← К списку</a>
                        <a class="btn-primary" href="/admin/category-edit/{{ $category->id }}">✏️ Редактировать</a>
                    </div>
                </div>
                <table class="data-table" aria-label="Информация о категории">
                    <tbody>
                        <tr>
                            <th style="width:220px; background:#f9fafb;">ID</th>
                            <td>{{ $category->id }}</td>
                        </tr>
                        <tr>
                            <th style="background:#f9fafb;">Название</th>
                            <td>{{ $category->title }}</td>
                        </tr>
                        <tr>
                            <th style="background:#f9fafb;">Описание</th>
                            <td>{{ mb_strlen($category->description) === 0 ? '-' : $category->description }}</td>
                        </tr>
                        <tr>
                            <th style="background:#f9fafb;">Кол-во товаров</th>
                            <td><span class="badge">{{ count($category->goods) }}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <div class="card">
                    <div class="card-header">
                        <h2>Товары в категории</h2>
                        <a class="btn-primary" href="/admin/product-create">➕ Новый товар</a>
                    </div>

                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category->goods as $good)
                                <tr>
                                    <td>{{ $good->id }}</td>
                                    <td>{{ $good->title }}</td>
                                    <td>{{ $good->price }}</td>
                                    <td class="action-btns">
                                        <a class="btn-secondary" href="/admin/product-view/{{ $good->id }}">👁️</a>
                                        <a class="btn-secondary" href="/admin/product-edit/{{ $good->id }}">✏️</a>
                                        <form class="delete-product" action="/admin/product/{{ $good->id }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn-danger">🗑️</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
</body>

</html>
