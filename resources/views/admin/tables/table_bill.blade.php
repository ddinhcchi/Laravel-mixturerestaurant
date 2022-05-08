<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 md:pl-256">
        <div class="grid grid-flow-row-dense grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @if ($tables)
            @foreach ($tables as $table)
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg hover:bg-slate-100 md:grid-flow-row">
                    <a href="{{ route('admin.menu.bill', $table->id) }}">
                        <div class="px-6 py-4">
                            <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">
                                {{ $table->name }}</h4>
                            <p class="leading-normal text-gray-700">{{ $table->status->name }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
            @endif
        </div>
    </div>
</x-admin-layout>
