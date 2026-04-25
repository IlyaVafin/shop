<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование товара | ShopManager</title>
    <link rel="stylesheet" href={{ asset('styles.css') }}>
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
            <a class="tab-btn" href="./categories.html">📂 Категории</a>
            <a class="tab-btn active" href="./products.html">🏷️ Товары</a>
            <a class="tab-btn" href="./orders.html">📦 Заказы</a>
        </nav>

        <div class="card">
            <div class="card-header">
                <h2>Редактировать товар</h2>
                <a class="btn-secondary" href="./product-view.html">← К просмотру</a>
            </div>
            <form action="/admin/product/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="productName">Название (обяз., макс 20)</label>
                    <input class="@error('name') error-input @enderror" id="productName" name="name" type="text"
                        maxlength="20" value="{{ $product->title }}" required>
                </div>
                <div class="form-group">
                    <label for="productDesc">Описание (макс 50)</label>
                    <textarea class="@error('description') error-input @enderror" id="productDesc" name="description" rows="2"
                        maxlength="50">{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="productPrice">Цена (больше 10, формат xx.xx)</label>
                    <input class="@error('price') error-input @enderror" id="productPrice" name="price" type="text"
                        placeholder="99.99" value="499.99" required>
                </div>
                <div class="form-group">
                    <label for="productCategory">Категория</label>
                    <select class="@error('category') error-input @enderror" id="productCategory" name="category"
                        required>
                        @foreach ($categories as $category)
                            <option {{ $product->category->title == $category->title ? 'selected' : '' }}
                                value="{{ $category->title }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="productImages">Заменить/добавить изображения (макс 5, jpg/png)</label>
                    <input class="@error('images') error-input @enderror" type="file" id="productImages"
                        name="images[]" multiple accept="image/jpeg,image/png">
                    @error('images')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Текущие изображения (демо)</label>
                    <div class="image-preview-grid">
                        @foreach ($product->images as $image)
                            <img class="thumb-img" src="http://localhost:8000/storage/{{ $image->path }}"
                                alt="">
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="defaultImgSelect">Изображение по умолчанию</label>
                    <select id="defaultImgSelect" name="default_image">
                        @foreach ($product->images as $image)
                            <option value="1" selected>Изображение {{ $loop->index + 1 }}</option>
                        @endforeach
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
