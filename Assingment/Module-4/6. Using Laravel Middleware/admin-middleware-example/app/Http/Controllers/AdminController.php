<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return 'Admin Dashboard - Welcome Admin!';
    }

    public function users()
    {
        $users = User::all();
        return 'Total Users: ' . $users->count();
    }

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
        return 'User deleted successfully';
    }
}
