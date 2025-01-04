<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Location;
use App\Models\Land;
use App\Models\History;

class ProfileController extends Controller
{
    public function show()
    {
        // Menampilkan halaman profil pengguna
        return view('Auth.profile', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        // Mengupdate nama dan email
        $user->name = $request->name;
        $user->email = $request->email;

        // Hanya update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Simpan data pengguna
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui!');
    }

    public function destroy()
    {
        $user = Auth::user();

        // Hapus data terkait di tabel lain
        Location::where('user_id', $user->id)->delete();

        // Hapus akun pengguna
        $user->delete();

        return redirect('/')->with('success', 'Akun berhasil dihapus!');
    }
}
