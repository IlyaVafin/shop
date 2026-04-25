<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование товара | ShopManager</title>
    <link rel="stylesheet" href={{asset("styles.css")}}>
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
                <h2>Редактировать товар</h2>
                <a class="btn-secondary" href="./product-view.html">← К просмотру</a>
            </div>

            <form action="./product-view.html" method="get" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="productName">Название (обяз., макс 20)</label>
                    <input id="productName" name="name" type="text" maxlength="20" value="Смартфон X" required>
                </div>
                <div class="form-group">
                    <label for="productDesc">Описание (макс 50)</label>
                    <textarea id="productDesc" name="description" rows="2" maxlength="50">Демо-описание товара (по ТЗ до 50 символов)</textarea>
                </div>
                <div class="form-group">
                    <label for="productPrice">Цена (больше 10, формат xx.xx)</label>
                    <input id="productPrice" name="price" type="text" placeholder="99.99" value="499.99" required>
                </div>
                <div class="form-group">
                    <label for="productCategory">Категория</label>
                    <select id="productCategory" name="category" required>
                        <option value="1" selected>Электроника</option>
                        <option value="2">Одежда</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="productImages">Заменить/добавить изображения (макс 5, jpg/png)</label>
                    <input type="file" id="productImages" name="images" multiple accept="image/jpeg,image/png">
                </div>
                <div class="form-group">
                    <label>Текущие изображения (демо)</label>
                    <div class="image-preview-grid">
                        <img class="thumb-img" alt="Изображение 1" src="https://placehold.co/300x300?text=1">
                        <img class="thumb-img" alt="Изображение 2" src="https://placehold.co/300x300?text=2">
                        <img class="thumb-img" alt="Изображение 3" src="https://placehold.co/300x300?text=3">
                    </div>
                </div>
                <div class="form-group">
                    <label for="defaultImgSelect">Изображение по умолчанию</label>
                    <select id="defaultImgSelect" name="default_image">
                        <option value="1" selected>Изображение 1</option>
                        <option value="2">Изображение 2</option>
                        <option value="3">Изображение 3</option>
                    </select>
                </div>
                <div class="action-btns" style="justify-content:flex-end;">
                    <a class="btn-secondary" href="./product-view.html">Отмена</a>
                    <button type="submit" class="btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

