<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('q');

        $services = Service::query()
            ->with('master')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(6)
            ->withQueryString();

        return view('services.index', compact('services'));
    }

    public function show(Service $service)
    {
        $service->load('master');
        return view('services.show', compact('service'));
    }
}