@extends('app')

@section('title', 'Kontak')
@section('content')

    <form action="/documentations" method="post" enctype="multipart/form-data">
        @csrf
        <div class="">
            <label for="file" class="block text-sm form-medium">Nama Dokumen/Gambar</label>
            <input type="text" name="title" class="mt-5 block w-full" required>

        </div>
        <div class="">
            <label for="file" class="">Pilih file (PDF, DOCX, JPG, PNG, Maks, SMB)</label>
            <input type="file" name="attachment" id=""
                class="file:rounded-md file:bg-blue-50 mt-1 block w-full text-tmdark-700 file:text-sm file:font-semibold file:text-blue-600 hover:file:bg-blue-100"
                required>

        </div>

        <button type="submit"
            class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-wider hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Simpan</button>
    </form>

@endsection