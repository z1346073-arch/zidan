<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Tampilkan daftar semua user dengan fitur search dan pagination
     */
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $users = User::when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%')
                  ->orWhere('email', 'LIKE', '%' . $keyword . '%');
        })
        ->orderBy('created_at', 'desc')
        ->paginate(5);

        return view('pages.users.indexuser', compact('users', 'keyword'));
    }

    /**
     * Tampilkan detail user spesifik
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('pages.users.detailuser', compact('user'));
    }

    /**
     * Tampilkan form untuk membuat user baru
     */
    public function create()
    {
        return view('pages.users.createuser');
    }

    /**
     * Simpan user baru ke database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect()->route('user.index')->with('success', 'User berhasil dibuat.');
    }

    /**
     * Tampilkan form untuk edit user
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.users.edituser', compact('user'));
    }

    /**
     * Perbarui data user di database
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
        ]);

        $user->update($validated);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Hapus user dari database
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }

    /**
     * Search user berdasarkan nama atau email
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'LIKE', '%' . $query . '%')
                     ->orWhere('email', 'LIKE', '%' . $query . '%')
                     ->get();

        return view('users.partials.table', compact('users'));
    }
}








