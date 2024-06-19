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
        // 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
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
    public function edit(User $user)
    {
        // 
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
    public function destroy(User $user)
    {
        // 
    }

    /**
     * Download the specified resource from storage.
     */
    public function download(User $user)
    {
        // 
    }
}
