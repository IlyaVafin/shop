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
                <span class="user-email">admin@shop.com</span>
                <a class="logout-btn" href="./index.html">Выйти</a>
            </div>
        </div>

        <nav class="nav-tabs" aria-label="Разделы админ-панели">
            <a class="tab-btn active" href="./categories.html">📂 Категории</a>
            <a class="tab-btn" href="./products.html">🏷️ Товары</a>
            <a class="tab-btn" href="./orders.html">📦 Заказы</a>
        </nav>
        {{-- <div>
            <div class="card">
                <div class="card-header">
                    <h2>{{ $category->title }}</h2>
                    <div class="action-btns">
                        <a class="btn-secondary" href="./categories.html">← К списку</a>
                        <a class="btn-primary" href="/admin/category-edit/">✏️ Редактировать</a>
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
                            <td><span class="badge">3</span></td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
            <div>


                <div class="card">
                    <div class="card-header">
                        <h2>Товары в категории</h2>
                        <a class="btn-primary" href="./product-create.html">➕ Новый товар</a>
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
                            <tr>
                                <td>101</td>
                                <td>Смартфон X</td>
                                <td>499.99</td>
                                <td class="action-btns">
                                    <a class="btn-secondary" href="./product-view.html">👁️</a>
                                    <a class="btn-secondary" href="./product-edit.html">✏️</a>
                                    <a class="btn-danger" href="./category-view.html">🗑️</a>
                                </td>
                            </tr>
                            <tr>
                                <td>102</td>
                                <td>Чехол</td>
                                <td>19.99</td>
                                <td class="action-btns">
                                    <a class="btn-secondary" href="./product-view.html">👁️</a>
                                    <a class="btn-secondary" href="./product-edit.html">✏️</a>
                                    <a class="btn-danger" href="./category-view.html">🗑️</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
</body>

</html>
