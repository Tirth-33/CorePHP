<?php

namespace App\Http\Controllers;

use App\Models\{Order, Menu};
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $topItems = Menu::withCount('orders')->orderBy('orders_count', 'desc')->take(5)->get();
        return view('dashboard', compact('totalOrders', 'topItems'));
    }
}
