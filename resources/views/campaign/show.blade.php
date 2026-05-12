@extends('app')

@section('content')

    <div class="max-w-2xl mx-auto">
        <a href="/campaign" class="text-blue-500 mb-4 inline-block">&larr; Kembali</a>

        <div class="bg-white rounded shadow p-6">
            <h1 class="text-3xl font-bold mb-2">{{ $campaign->title }}</h1>

            <div class="mb-6">
                <p class="text-gray-600 mb-4">{{ $campaign->description }}</p>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="bg-blue-50 p-4 rounded">
                    <p class="text-gray-600 text-sm">Target Donasi</p>
                    <p class="text-2xl font-bold text-blue-600">
                        Rp{{ number_format($campaign->target_donation, 0, ',', '.') }}</p>
                </div>
                <div class="bg-green-50 p-4 rounded">
                    <p class="text-gray-600 text-sm">Terkumpul</p>
                    <p class="text-2xl font-bold text-green-600">
                        Rp{{ number_format($campaign->collected_donation, 0, ',', '.') }}</p>
                </div>
            </div>

            <div class="mb-6">
                <div class="w-full bg-gray-200 rounded h-4">
                    <div class="bg-green-500 h-4 rounded"
                        style="width: {{ ($campaign->collected_donation / $campaign->target_donation) * 100 }}%"></div>
                </div>
                <p class="text-sm text-gray-600 mt-2">
                    {{ round(($campaign->collected_donation / $campaign->target_donation) * 100, 1) }}% terkumpul
                </p>
            </div>

            <p class="text-gray-600 mb-6">
                <strong>Deadline:</strong> {{ $campaign->deadline }}
            </p>

            <div class="flex gap-2">
                <a href="/campaign/{{ $campaign->id }}/edit" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Edit
                </a>
                <form action="/campaign/{{ $campaign->id }}" method="POST" class="inline"
                    onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
                </form>
            </div>
        </div>
    </div>

@endsection