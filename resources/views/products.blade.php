<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары | ShopManager</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <div class="admin-container">
        <div class="header">
            <div class="logo"><h1>🛍️ ShopManager</h1></div>
            <div class="user-info">
                <span class="user-email">admin@shop.com</span>
                <a class="logout-btn" href="./index.html">Выйти</a>
            </div>
        </div>

        <nav class="nav-tabs" aria-label="Разделы админ-панели">
            <a class="tab-btn" href="./categories.html">📂 Категории</a>
            <a class="tab-btn active" href="./products.html">🏷️ Товары</a>
            <a class="tab-btn" href="./orders.html">📦 Заказы</a>
        </nav>

        <div class="panel">
            <div class="card">
                <div class="card-header">
                    <h2>Список товаров</h2>
                    <a class="btn-primary" href="./product-create.html">➕ Новый товар</a>
                </div>

                <table class="data-table">
                    <thead><tr><th>Изобр.</th><th>Название</th><th>Цена</th><th>Действия</th></tr></thead>
                    <tbody>
                        <tr>
                            <td><img src="https://placehold.co/300x300?text=Demo" alt="Смартфон X" width="50" class="thumb-img"></td>
                            <td>Смартфон X</td>
                            <td>499.99</td>
                            <td class="action-btns">
                                <a class="btn-secondary" href="./product-view.html">👁️</a>
                                <a class="btn-secondary" href="./product-edit.html">✏️</a>
                                <a class="btn-danger" href="./products.html">🗑️</a>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://placehold.co/300x300?text=Demo" alt="Наушники Pro" width="50" class="thumb-img"></td>
                            <td>Наушники Pro</td>
                            <td>89.90</td>
                            <td class="action-btns">
                                <a class="btn-secondary" href="./product-view.html">👁️</a>
                                <a class="btn-secondary" href="./product-edit.html">✏️</a>
                                <a class="btn-danger" href="./products.html">🗑️</a>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://placehold.co/300x300" alt="Футболка" width="50" class="thumb-img"></td>
                            <td>Футболка</td>
                            <td>25.50</td>
                            <td class="action-btns">
                                <a class="btn-secondary" href="./product-view.html">👁️</a>
                                <a class="btn-secondary" href="./product-edit.html">✏️</a>
                                <a class="btn-danger" href="./products.html">🗑️</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="pagination" aria-label="Пагинация (демо)">
                    <a class="page-link" href="./products.html">1</a>
                    <a class="page-link" href="./products.html">2</a>
                    <a class="page-link" href="./products.html">3</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

