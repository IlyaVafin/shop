<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Категории | ShopManager</title>
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
            <a class="tab-btn active" href="./categories.html">📂 Категории</a>
            <a class="tab-btn" href="./products.html">🏷️ Товары</a>
            <a class="tab-btn" href="./orders.html">📦 Заказы</a>
        </nav>

        <div class="panel">
            <div class="card">
                <div class="card-header">
                    <h2>Список категорий</h2>
                    <a href="./category-create.html" class="btn-primary">➕ Создать категорию</a>
                </div>

                <table class="data-table">
                    <thead>
                        <tr><th>ID</th><th>Название</th><th>Описание</th><th>Кол-во товаров</th><th>Действия</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td><td>Электроника</td><td>Смартфоны, ноутбуки</td><td>3</td>
                            <td class="action-btns">
                                <a class="btn-secondary" href="./category-view.html">👁️</a>
                                <a class="btn-secondary" href="./category-edit.html">✏️</a>
                                <span class="btn-danger" aria-disabled="true" style="opacity:0.5; pointer-events:none;">🗑️</span>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td><td>Одежда</td><td>Мужская, женская коллекция</td><td>0</td>
                            <td class="action-btns">
                                <a class="btn-secondary" href="./category-view.html">👁️</a>
                                <a class="btn-secondary" href="./category-edit.html">✏️</a>
                                <a class="btn-danger" href="./categories.html">🗑️</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

