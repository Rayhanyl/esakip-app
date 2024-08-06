<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('superadmin.user_management.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.user_management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role'     => 'required',
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal menambahkan user', 'danger');
            return redirect()->route('admin.user-management.create')
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        Alert::toast('Berhasil menambahkan user', 'success');
        return redirect()->route('admin.user-management.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        return view('superadmin.user_management.edit', compact('user'));
    }

    public function profile(User $user, Request $request)
    {
        return view('admin.user_management.profile', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
    {
        $user = User::findOrFail($user);

        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);
        if ($validator->fails()) {
            Alert::toast('Gagal mengubah data user', 'danger');
            return redirect()->route('admin.user-management.profile', ['user' => Auth::user()->id])
                ->withErrors($validator)
                ->withInput();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->role = $user->role;
        $user->save();
        Alert::toast('Berhasil mengubah data user', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        // Check if the user is trying to delete their own account (optional check)
        if ($user->id === Auth::id()) {
            Alert::toast('Tidak dapat menghapus akun Anda sendiri', 'danger');
            return redirect()->route('admin.user-management.index');
        }

        // Delete the user
        $user->delete();

        Alert::toast('Berhasil menghapus user', 'success');
        return redirect()->route('admin.user-management.index');
    }


    /**
     * Download the specified resource from storage.
     */
    public function download(User $user)
    {
        //
    }
}
