<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Service::class);
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $this->authorize('create', Service::class);
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Service::class);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        Service::create($validated);

        return redirect()->route('admin.services.index');
    }

    public function edit(Service $service)
    {
        $this->authorize('update', $service);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $this->authorize('update', $service);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $service->update($validated);

        return redirect()->route('admin.services.index');
    }

    public function destroy(Service $service)
    {
        $this->authorize('delete', $service);
        $service->delete();

        return redirect()->route('admin.services.index');
    }
}