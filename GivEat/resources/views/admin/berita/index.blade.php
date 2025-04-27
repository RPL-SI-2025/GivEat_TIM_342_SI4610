@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-10">
    <div class="bg-white shadow-md rounded border border-gray-200">
        <div class="flex items-center justify-between bg-green-700 text-white px-6 py-3 rounded-t">
            <h2 class="text-lg font-semibold">Berita Management</h2>
            <a href="{{ route('admin.berita.create') }}"
               class="bg-white text-green-700 font-medium px-4 py-2 rounded hover:bg-gray-100 transition">
                + Add Berita
            </a>
        </div>
        <div class="p-6 overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100 text-left text-sm font-medium text-gray-700">
                        <th class="py-2 px-4 border-b">#</th>
                        <th class="py-2 px-4 border-b">Judul</th>
                        <th class="py-2 px-4 border-b">Ringkasan</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($beritas as $index => $berita)
                        <tr class="border-b text-sm text-gray-800">
                            <td class="py-2 px-4">{{ $index + 1 }}</td>
                            <td class="py-2 px-4">{{ $berita->judul }}</td>
                            <td class="py-2 px-4">{{ Str::limit($berita->ringkasan, 100) }}</td>
                            <td class="py-2 px-4 flex gap-2">
                                <a href="{{ route('admin.berita.edit', $berita->id) }}"
                                   class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition text-sm">
                                    Edit
                                </a>
                                <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition text-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($beritas->isEmpty())
                        <tr>
                            <td colspan="4" class="py-4 px-4 text-center text-gray-500">Tidak ada berita tersedia.</td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
