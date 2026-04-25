<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр товара | ShopManager</title>
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

        <div class="card">
            <div class="card-header">
                <h2>Товар: Смартфон X</h2>
                <div class="action-btns">
                    <a class="btn-secondary" href="./products.html">← К списку</a>
                    <a class="btn-primary" href="./product-edit.html">✏️ Редактировать</a>
                </div>
            </div>

            <table class="data-table" aria-label="Информация о товаре">
                <tbody>
                    <tr><th style="width:220px; background:#f9fafb;">ID</th><td>101</td></tr>
                    <tr><th style="background:#f9fafb;">Название</th><td>Смартфон X</td></tr>
                    <tr><th style="background:#f9fafb;">Описание</th><td>Демо-описание товара (по ТЗ до 50 символов)</td></tr>
                    <tr><th style="background:#f9fafb;">Цена</th><td>499.99</td></tr>
                    <tr><th style="background:#f9fafb;">Категория</th><td><a href="./category-view.html">Электроника</a></td></tr>
                </tbody>
            </table>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>Изображения</h2>
                <span class="badge">демо</span>
            </div>
            <div class="image-preview-grid">
                <img class="thumb-img" alt="Изображение 1" src="https://placehold.co/300x300?text=1">
                <img class="thumb-img" alt="Изображение 2" src="https://placehold.co/300x300?text=2">
                <img class="thumb-img" alt="Изображение 3" src="https://placehold.co/300x300?text=3">
            </div>
            <div style="font-size:12px; margin-top:12px; color:#6c757d;">
                * В backend-версии: водяной знак "Shop" и миниатюры 300x300
            </div>
        </div>
    </div>
</body>
</html>

