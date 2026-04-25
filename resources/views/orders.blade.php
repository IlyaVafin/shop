<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заказы | ShopManager</title>
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
            <a class="tab-btn" href="./products.html">🏷️ Товары</a>
            <a class="tab-btn active" href="./orders.html">📦 Заказы</a>
        </nav>

        <div class="panel">
            <div class="card">
                <div class="card-header">
                    <h2>Список заказов</h2>
                </div>

                <table class="data-table">
                    <thead><tr><th>Товар</th><th>Email пользователя</th><th>Цена</th><th>Статус</th></tr></thead>
                    <tbody>
                        <tr><td><a href="./product-view.html">Смартфон X</a></td><td>client@example.com</td><td>499.99</td><td><span class="status-success">оплачено</span></td></tr>
                        <tr><td><a href="./product-view.html">Наушники Pro</a></td><td>ivan@test.ru</td><td>89.90</td><td><span class="status-pending">не оплачено</span></td></tr>
                        <tr><td><a href="./product-view.html">Чехол</a></td><td>petr@shop.ru</td><td>15.00</td><td><span class="status-failed">ошибка оплаты</span></td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

