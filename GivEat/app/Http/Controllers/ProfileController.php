<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Tampilkan form edit profil pengguna.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update informasi profil pengguna.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validated = $request->validated();

        // Jika validasi tidak mencakup gender & city, tambahkan secara eksplisit
        if (!$request->has('gender')) {
            $validated['gender'] = $user->gender;
        } else {
            $validated['gender'] = $request->input('gender');
        }

        if (!$request->has('city')) {
            $validated['city'] = $user->city;
        } else {
            $validated['city'] = $request->input('city');
        }

        // Handle upload foto profil baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika bukan default
            if ($user->image && $user->image !== 'profile/default.png') {
                Storage::disk('public')->delete($user->image);
            }

            // Upload gambar baru
            $validated['image'] = $request->file('image')->store('profile', 'public');
        }

        // Update data user
        $user->fill($validated);

        // Reset verifikasi email jika email berubah
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Hapus akun pengguna.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Hapus foto profil jika bukan default
        if ($user->image && $user->image !== 'profile/default.png') {
            Storage::disk('public')->delete($user->image);
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'gender' => ['nullable', 'in:Laki-laki,Perempuan'],
            'city' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
