<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManajemenmitraController extends Controller
{
    public function index()
    {
        $mitras = User::where('usertype', 'mitra')->get();
        return view('admin.manajemenmitra.index', compact('mitras'));
    }

    public function create()
    {
        return view('admin.manajemenmitra.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => 'mitra',
        ]);

        return redirect()->route('admin.manajemenmitra.index')->with('success', 'Mitra berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mitra = User::where('usertype', 'mitra')->findOrFail($id);
        return view('admin.manajemenmitra.edit', compact('mitra'));
    }

    public function update(Request $request, $id)
    {
        $mitra = User::where('usertype', 'mitra')->findOrFail($id);

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $mitra->id,
        ];

        // Jika password diisi, tambahkan validasi
        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:6|confirmed';
        }

        $request->validate($rules);

        $mitra->name = $request->name;
        $mitra->email = $request->email;

        if ($request->filled('password')) {
            $mitra->password = Hash::make($request->password);
        }

        $mitra->usertype = 'mitra'; // pastikan tetap mitra
        $mitra->save();

        return redirect()->route('admin.manajemenmitra.index')->with('success', 'Data mitra berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $mitra = User::where('usertype', 'mitra')->findOrFail($id);
        $mitra->delete();

        return redirect()->route('admin.manajemenmitra.index')->with('success', 'Mitra berhasil dihapus.');
    }
}