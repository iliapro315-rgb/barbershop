<?php

namespace App\Http\Controllers;

class ServiceController extends Controller
{
    public function index()
    {
        $items = config('catalog.items');

        return view('services.index', compact('items'));
    }

    public function show(int $id)
    {
        $item = config("catalog.items.$id");

        abort_if(!$item, 404);

        return view('services.show', [
            'id' => $id,
            'item' => $item,
        ]);
    }
}
