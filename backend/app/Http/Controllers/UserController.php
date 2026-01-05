<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() { return User::paginate(); }

    public function store(Request $r)
    {
        $data = $r->validate([
            'company_id' => ['required','integer'],
            'role_id' => ['required','integer'],
            'name' => ['required'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:6'],
        ]);
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }

    public function show(User $user) { return $user; }

    public function update(Request $r, User $user)
    {
        $data = $r->all();
        if (isset($data['password'])) $data['password'] = Hash::make($data['password']);
        $user->update($data);
        return $user;
    }

    public function destroy(User $user) { $user->delete(); return response()->noContent(); }
}
