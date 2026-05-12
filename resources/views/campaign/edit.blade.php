@extends('app')

@section('content')

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Edit Campaign</h1>

        <form action="/campaign/{{ $campaign->id }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium mb-2">Judul</label>
                <input type="text" name="title" value="{{ $campaign->title }}" class="border p-2 w-full rounded" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Deskripsi</label>
                <textarea name="description" class="border p-2 w-full rounded" rows="5"
                    required>{{ $campaign->description }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Target Donasi</label>
                <input type="number" name="target_donation" value="{{ $campaign->target_donation }}"
                    class="border p-2 w-full rounded" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Dana Terkumpul</label>
                <input type="number" name="collected_donation" value="{{ $campaign->collected_donation }}"
                    class="border p-2 w-full rounded" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2">Deadline</label>
                <input type="date" name="deadline" value="{{ $campaign->deadline }}" class="border p-2 w-full rounded"
                    required>
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                    Update
                </button>
                <a href="/campaign/{{ $campaign->id }}" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">
                    Batal
                </a>
            </div>
        </form>
    </div>

@endsection