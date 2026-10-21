<?php
 
use Illuminate\Support\Facades\Route;
 
Route::get('/', function () {
    return view('home');
})->name('home');
// Страница "О проекте"
Route::get('/about', function () {
    return view('about', [
        'fio' => 'Иванов Иван Иванович', // Укажите ваши ФИО
        'group' => 'ИС-21'               // Укажите вашу группу
    ]);
})->name('about');

// Страница "Контакты"
Route::get('/contacts', function () {
    return view('contacts', [
        'address' => 'г. Костанай, ул. Байтурсынова, 47',
        'phone' => '+7 (7142) 00-00-00',
        'email' => 'barbershop@example.com'
    ]);
})->name('contacts');

// Приветствие по имени (без отдельного файла шаблона, возвращает строку)
Route::get('/hello/{name}', function ($name) {
    return "Здравствуйте, {$name}! Добро пожаловать в Барбершоп.";
});

// Страница услуги по ID (только цифры)
Route::get('/services/{id}', function (string $id) {
    return view('service', ['id' => $id]);
})->whereNumber('id')->name('services.show');