<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="grid grid-cols-3 gap-4">
                <a href="{{ route('menus.index') }}" class="bg-blue-600 p-6 rounded-lg text-center hover:bg-blue-700">
                    <h3 class="text-2xl font-bold text-white">Menus</h3>
                </a>
                <a href="{{ route('customers.index') }}" class="bg-green-600 p-6 rounded-lg text-center hover:bg-green-700">
                    <h3 class="text-2xl font-bold text-white">Customers</h3>
                </a>
                <a href="{{ route('orders.index') }}" class="bg-purple-600 p-6 rounded-lg text-center hover:bg-purple-700">
                    <h3 class="text-2xl font-bold text-white">Orders</h3>
                </a>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg">
                <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Statistics</h3>
                <p class="text-gray-700 dark:text-gray-300">Total Orders: <strong>{{ $totalOrders }}</strong></p>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg">
                <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-gray-100">Top Menu Items</h3>
                <ul class="space-y-2">
                    @foreach($topItems as $item)
                        <li class="text-gray-700 dark:text-gray-300">{{ $item->name }} - <strong>{{ $item->orders_count }}</strong> orders</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
