<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.profil', [
            'title' => 'Profil',
        ]);
    }

    public function updateProfil(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
        ]);

        $user->update([
            'name' => ucfirst($request->name),
            'email' => $request->email,
        ]);

        return back()->with('success', 'Profil berhasil diupdate');
    }

    public function changePassword(Request $request, User $user)
    {
        $request->validate([
            'password_lama' => 'required',
            'password' => 'required|confirmed',
        ]);

        if (!password_verify($request->password_lama, $user->password)) {
            return back()->with('danger', 'Password lama Anda salah.');
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('successPassword', 'Berhasil mengubah password.');
    }
}
