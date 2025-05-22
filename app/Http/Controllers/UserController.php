<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // return view('users.index', ['users' => DB::table('users')->get(),]);
        return view('users.index', [
            'users' => User::all(),
        ]);
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        // DB::table('users')->insert([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'email_verified_at' => now(),
        //     'password' => hash::make($request->password),
        //     'remember_token' => str::random(10),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);


        // return redirect()->route('users.index')->with('success', 'User created successfully.');
        $validatedData = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'email_verified_at' => now(),
            'password' => Hash::make($validatedData['password']),
            'remember_token' => Str::random(10),
        ]);
        return redirect()->route('users.index')->with(
            'success',
            'User berhasil disimpan.'
        );
    }
    public function edit($id)
    {
        return view('users.edit', ['users' => DB::table('users')->find($id),]);

    }
    public function update(Request $request, $id)
    {
        // DB::table('users')->where('id', $id)->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => hash::make($request->password),
        // ]);

        // return redirect()->route('users.index')->with(
        //     'success',
        //     'User berhasil diupdate.'
        // );
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('users.index')->with(
            'success',
            'User berhasil diupdate.'
        );
    }
    public function destroy($id)
    {
        // DB::table('users')->where('id', $id)->delete();

        // return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with(
            'success',
            'User berhasil dihapus.'
        );
    }
}
