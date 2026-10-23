@extends('layouts.app')

@section('title', 'О проекте')

@section('content')
    <h1>О проекте</h1>
    <p><strong>ФИО:</strong> {{ $fio }}</p>
    <p><strong>Группа:</strong> {{ $group }}</p>
    <p>
        Учебный проект «Барбершоп» — каталог услуг и мастеров.
        Здесь можно посмотреть список услуг, карточки и записаться к мастеру.
    </p>
@endsection