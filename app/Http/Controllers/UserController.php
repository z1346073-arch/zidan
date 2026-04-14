<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        if ($keyword != '') {
            $users = User::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        } else {
            $users = User::orderby('id')->paginate(5);
        }
        return view('pages.indexuser', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('pages.showuser', compact('user'));
    }

    public function create()
    {
        return view('pages.createuser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/users')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.edituser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
            ]);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return redirect('/users')->with('success', 'User updated successfully.');
        } else {
            return redirect('/users')->with('error', 'User not found.');
        }
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users')->with('success', 'User deleted successfully.');
    }
}










