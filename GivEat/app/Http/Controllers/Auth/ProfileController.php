<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function showProfile()
    {
        return view('auth.profile');
    }

    public function deletePhoto(Request $request)
    {
        $user = Auth::user();
        // Periksa apakah foto bukan default
        if ($user->image !== 'profile/default.png') {
            // Hapus foto dari storage
            Storage::delete($user->image);
            // Kembalikan ke default
            $user->update(['image' => 'profile/default.png']);
            // dd("harusnya udah di hapus dan udah di edit");
            return redirect()->route('profile')->with('success', 'Foto profil berhasil dihapus!');
        }

        return redirect()->route('profile')->with('error', 'Tidak ada foto profil untuk dihapus.');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'gender' => ['nullable', 'string', 'max:50'],
            'city' => ['nullable', 'string', 'max:100'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus valid.',
            'email.unique' => 'Email sudah terdaftar.',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'city' => $request->city,
        ]);

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ], [
            'image.required' => 'Foto profil wajib diunggah.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpg, jpeg, atau png.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $user = Auth::user();

        // Hapus foto lama jika bukan default
        if ($user->image !== 'profile/default.png' && Storage::exists($user->image)) {
            Storage::delete($user->image);
        }

        // Simpan foto baru
        $path = $request->file('image')->store('profile', 'public');
        $user->update(['image' => $path]);

        return redirect()->route('profile')->with('success', 'Foto profil berhasil diperbarui!');
    }
}
