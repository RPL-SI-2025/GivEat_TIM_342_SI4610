@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Kelola Berita</h1>
        <a href="{{ route('admin.berita.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Tambah Berita</a>
    </div>

    <div class="bg-white shadow rounded">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-2">Judul</th>
                    <th class="px-4 py-2">Ringkasan</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beritas as $berita)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $berita->judul }}</td>
                    <td class="px-4 py-2">{{ Str::limit($berita->ringkasan, 50) }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('admin.berita.edit', $berita->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus berita ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
