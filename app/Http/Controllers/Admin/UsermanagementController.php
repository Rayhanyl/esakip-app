<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UsermanagementController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.admin.user_management.index', compact('users'));
    }

    public function create()
    {
        return view('admin.admin.user_management.create');
    }

    public function edit(User $user)
    {
        return view('admin.admin.user_management.edit', compact('user'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.user-management.index')
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        Alert::toast('Berhasil membuat user', 'success');
        return redirect()->route('admin.user-management.index')->with('success', 'Berhasil membuat user');
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.edit.user.page', $user)
                ->withErrors($validator)
                ->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;
        $user->save();
        Alert::toast('Berhasil mengubah data user', 'success');
        return redirect()->route('admin.user-management.index')->with('success', 'Berhasil mengubah data user');
    }

    public function delete(User $user)
    {
        $user->delete();
        Alert::toast('Berhasil menghapus user', 'success');
        return redirect()->route('admin.user-management.index')->with('success', 'Berhasil menghapus user');
    }
}
