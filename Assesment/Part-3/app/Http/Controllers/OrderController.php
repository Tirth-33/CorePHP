<?php

namespace App\Http\Controllers;

use App\Models\{Order, Customer, Menu};
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index', ['orders' => Order::with(['customer', 'menu'])->get()]);
    }

    public function create()
    {
        return view('orders.create', ['customers' => Customer::all(), 'menus' => Menu::all()]);
    }

    public function store(Request $request)
    {
        $request->validate(['customer_id' => 'required', 'menu_id' => 'required', 'quantity' => 'required|integer']);
        Order::create($request->all());
        return redirect()->route('orders.index');
    }

    public function edit(Order $order)
    {
        return view('orders.edit', ['order' => $order, 'customers' => Customer::all(), 'menus' => Menu::all()]);
    }

    public function update(Request $request, Order $order)
    {
        $request->validate(['customer_id' => 'required', 'menu_id' => 'required', 'quantity' => 'required|integer']);
        $order->update($request->all());
        return redirect()->route('orders.index');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }

    public function toggleStatus(Order $order)
    {
        $order->update(['status' => $order->status === 'pending' ? 'delivered' : 'pending']);
        return back();
    }
}
