<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заказы | ShopManager</title>
    <link rel="stylesheet" href="{{asset('styles.css')}}">
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
            <a class="tab-btn" href="/admin/products">🏷️ Товары</a>
            <a class="tab-btn active" href="/admin/orders">📦 Заказы</a>
        </nav>

        <div class="panel">
            <div class="card">
                <div class="card-header">
                    <h2>Список заказов</h2>
                </div>

                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Товар</th>
                            <th>Email пользователя</th>
                            <th>Цена</th>
                            <th>Статус</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="./product-view.html">Смартфон X</a></td>
                            <td>client@example.com</td>
                            <td>499.99</td>
                            <td><span class="status-success">оплачено</span></td>
                        </tr>
                        <tr>
                            <td><a href="./product-view.html">Наушники Pro</a></td>
                            <td>ivan@test.ru</td>
                            <td>89.90</td>
                            <td><span class="status-pending">не оплачено</span></td>
                        </tr>
                        <tr>
                            <td><a href="./product-view.html">Чехол</a></td>
                            <td>petr@shop.ru</td>
                            <td>15.00</td>
                            <td><span class="status-failed">ошибка оплаты</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
