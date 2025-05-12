<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 

class AdminController extends Controller
{
    public function dashboard()
{
    $totalMitra = User::where('usertype', 'mitra')->count();
    $totalUser = User::where('usertype', 'user')->count();

    $mitras = User::where('usertype', 'mitra')->latest()->take(5)->get();
    $users = User::where('usertype', 'user')->latest()->take(5)->get();

    return view('admin.dashboard', compact('totalMitra', 'totalUser', 'mitras', 'users'));
}

    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('admin.dashboard')->with('success', 'User berhasil dihapus.');
}

    public function detail($id)
{
    $user = User::withCount('donations')->findOrFail($id);
    $user->transaction_count = $user->donations_count;
    return redirect()->route('admin.dashboard')->with('detail', $user);
}


}   
