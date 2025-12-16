<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginAdmin()
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@test.com'],
            ['name' => 'Admin', 'password' => bcrypt('password'), 'role' => 'admin']
        );
        Auth::login($admin);
        return 'Logged in as Admin';
    }

    public function loginUser()
    {
        $user = User::firstOrCreate(
            ['email' => 'user@test.com'],
            ['name' => 'User', 'password' => bcrypt('password'), 'role' => 'user']
        );
        Auth::login($user);
        return 'Logged in as Regular User';
    }

    public function logout()
    {
        Auth::logout();
        return 'Logged out';
    }
}
