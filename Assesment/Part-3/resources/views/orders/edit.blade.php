<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit Order</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg">
                <form action="{{ route('orders.update', $order) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Customer</label>
                        <select name="customer_id" class="w-full border rounded px-3 py-2 dark:bg-gray-700 dark:text-white" required>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Menu</label>
                        <select name="menu_id" class="w-full border rounded px-3 py-2 dark:bg-gray-700 dark:text-white" required>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}" {{ $order->menu_id == $menu->id ? 'selected' : '' }}>{{ $menu->name }} - ${{ $menu->price }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Quantity</label>
                        <input type="number" name="quantity" value="{{ $order->quantity }}" class="w-full border rounded px-3 py-2 dark:bg-gray-700 dark:text-white" required>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
