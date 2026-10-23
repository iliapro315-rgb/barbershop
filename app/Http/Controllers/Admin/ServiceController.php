<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Master;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $items = Service::with('master')
            ->orderBy('id')
            ->paginate(10);

        return view('admin.services.index', compact('items'));
    }

    public function create(): View
    {
        $masters = Master::orderBy('name')->get();

        return view('admin.services.create', compact('masters'));
    }

    public function store(StoreServiceRequest $request): RedirectResponse
    {
        Service::create($request->validated());

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Услуга добавлена');
    }

    public function edit(Service $service): View
    {
        $masters = Master::orderBy('name')->get();

        return view('admin.services.edit', compact('service', 'masters'));
    }

    public function update(UpdateServiceRequest $request, Service $service): RedirectResponse
    {
        $service->update($request->validated());

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Услуга обновлена');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Услуга удалена');
    }
}