
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление услуги</title>
</head>
<body>
    <h1>Добавление услуги</h1>

    <form>
        <label>
            Название услуги:
            <input type="text" name="title">
        </label>

        <br><br>

        <label>
            Цена:
            <input type="number" name="price">
        </label>

        <br><br>

        <button type="button" onclick="alert('Форма пока демонстрационная')">
            Добавить
        </button>
    </form>

    <br>
    <a href="{{ route('admin.services') }}">Назад к услугам</a>
</body>
</html>
