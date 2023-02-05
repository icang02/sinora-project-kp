<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManajemenUserController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.manajemen-user', [
            'title' => 'Manajemen User',
            'users' => User::all(),
        ]);
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required|confirmed|min:3',
        ]);

        User::create([
            'name' => ucfirst($request->name),
            'email' => $request->email,
            'level' => $request->level,
            'password' => Hash::make($request->password),
        ]);
        return back()->with('success', 'User baru telah ditambahkan.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $name = $user->name;

        $user->delete();
        return back()->with('success', "User $name berhasil dihapus.");
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'confirmed',
            'status' => 'required',
        ]);

        $user = User::findOrFail($id);
        $password = $request->password;
        if ($request->password == null) {
            $password = $user->password;
        }

        $user->update([
            'name' => ucfirst($request->name),
            'email' => $request->email,
            'level' => $request->level,
            // 'password' => Hash::make($password),
            'status' => $request->status,
        ]);
        return back()->with('success', 'Data user berhasil diupdate.');
    }

    public function reset(User $user)
    {
        $defaultPassword = Hash::make('user123');
        $user->update(['password' => $defaultPassword]);
        return back()->with('success', 'Password user telah direset ke "user123".');
    }
}
