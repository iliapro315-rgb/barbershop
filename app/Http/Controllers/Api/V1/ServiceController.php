<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->validate([
            'q'        => ['nullable', 'string', 'max:100'],
            'master'   => ['nullable', 'integer', 'exists:masters,id'],
            'sort'     => ['nullable', 'in:price,-price,title'],
            'per_page' => ['nullable', 'integer', 'between:1,50'],
        ]);

        $sort = $data['sort'] ?? 'title';

        $services = Service::with('master')
            ->search($data['q'] ?? null)
            ->when($data['master'] ?? null, fn ($q, $m) => $q->where('master_id', $m))
            ->orderBy(ltrim($sort, '-'), str_starts_with($sort, '-') ? 'desc' : 'asc')
            ->paginate($data['per_page'] ?? 10)
            ->withQueryString();

        return ServiceResource::collection($services);
    }

    public function show(Service $service)
    {
        return new ServiceResource($service->load('master'));
    }

    public function random()
    {
        $service = Service::with('master')->where('is_active', true)->inRandomOrder()->firstOrFail();
        return new ServiceResource($service);
    }

    public function stats()
    {
        $stats = Cache::remember('api.stats', now()->addMinutes(5), function () {
            return [
                'total_services' => Service::count(),
                'total_masters'  => Service::select('master_id')->distinct()->count(),
                'latest_updated' => Service::latest('updated_at')->value('updated_at')?->toIso8601String(),
            ];
        });

        return response()->json($stats);
    }
}