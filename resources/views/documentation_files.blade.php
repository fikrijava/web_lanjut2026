@extends('app')

@section('title', 'Documentation Files')

@section('content')
<div class="max-w-6xl mx-auto my-6 px-4">
    
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded shadow-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Unggah Dokumen atau Lampiran</h2>
        <form action="/documentations" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Dokumen/Gambar</label>
                <input type="text" name="title" class="mt-1 block w-full border border-gray-300 rounded p-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Pilih File (PDF, DOCX, PNG, JPG - Maks 5MB)</label>
                <input type="file" name="attachment" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition font-medium">Unggah File</button>
        </form>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2">Daftar Berkas & Lampiran</h2>
        
        @if($files->isEmpty())
            <div class="text-center py-8 text-gray-500">
                <p class="text-lg">Belum ada file yang diunggah.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                            <th class="p-4 border-b">Nama Dokumen</th>
                            <th class="p-4 border-b">Tipe</th>
                            <th class="p-4 border-b text-center">Preview / Konten</th>
                            <th class="p-4 border-b text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-sm text-gray-600">
                        @foreach($files as $file)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4 font-medium text-gray-900">
                                    {{ $file->title }}
                                </td>
                                
                                <td class="p-4">
                                    <span class="px-2 py-1 text-xs font-semibold rounded uppercase 
                                        {{ in_array($file->file_type, ['jpg', 'jpeg', 'png', 'webp']) ? 'bg-purple-100 text-purple-800' : 'bg-amber-100 text-amber-800' }}">
                                        {{ $file->file_type }}
                                    </span>
                                </td>
                                
                                <td class="p-4 flex justify-center">
                                    @if(in_array($file->file_type, ['jpg', 'jpeg', 'png', 'webp']))
                                        <div class="w-32 h-20 overflow-hidden rounded border border-gray-200 bg-gray-50 shadow-sm">
                                            <img src="{{ asset('storage/' . $file->file_path) }}" 
                                                 alt="{{ $file->title }}" 
                                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-200">
                                        </div>
                                    @elseif($file->file_type === 'pdf')
                                        <div class="flex flex-col items-center text-red-500 bg-red-50 p-2 rounded border border-red-200 w-32 justify-center h-20">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="text-[10px] font-bold mt-1 text-red-700">KLIK LIHAT PDF</span>
                                        </div>
                                    @else
                                        <div class="flex flex-col items-center text-blue-500 bg-blue-50 p-2 rounded border border-blue-200 w-32 justify-center h-20">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            <span class="text-[10px] font-bold mt-1 text-blue-700">DOKUMEN WORD</span>
                                        </div>
                                    @endif
                                </td>
                                
                                <td class="p-4 text-center">
                                    <a href="{{ asset('storage/' . $file->file_path) }}" 
                                       target="_blank" 
                                       class="inline-flex items-center px-3 py-1.5 bg-gray-800 hover:bg-gray-900 text-white text-xs font-medium rounded shadow-sm transition">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                        </svg>
                                        Buka / Download
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection