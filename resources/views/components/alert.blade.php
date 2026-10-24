@props(['type' => 'success', 'message'])

<div class="p-4 mb-4 rounded {{ $type === 'success' ? 'bg-green-800 text-green-100' : 'bg-red-800 text-red-100' }}">
    {{ $message ?? $slot }}
</div>