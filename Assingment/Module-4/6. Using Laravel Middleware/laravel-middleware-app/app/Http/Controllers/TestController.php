<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function createUsers()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Regular User',
            'email' => 'user@test.com',
            'password' => bcrypt('password'),
            'role' => 'user'
        ]);

        return 'Test users created!';
    }

    public function loginAdmin()
    {
        $user = User::where('email', 'admin@test.com')->first();
        Auth::login($user);
        return 'Logged in as admin';
    }

    public function loginUser()
    {
        $user = User::where('email', 'user@test.com')->first();
        Auth::login($user);
        return 'Logged in as regular user';
    }

    public function adminDashboard()
    {
        return 'Welcome to Admin Dashboard!';
    }
}
