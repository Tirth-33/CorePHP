<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Orders</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('orders.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Add Order</a>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <th class="px-4 py-2 text-left text-gray-900 dark:text-gray-100">Customer</th>
                            <th class="px-4 py-2 text-left text-gray-900 dark:text-gray-100">Menu</th>
                            <th class="px-4 py-2 text-left text-gray-900 dark:text-gray-100">Qty</th>
                            <th class="px-4 py-2 text-left text-gray-900 dark:text-gray-100">Status</th>
                            <th class="px-4 py-2 text-left text-gray-900 dark:text-gray-100">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-2 text-gray-900 dark:text-gray-100">{{ $order->customer->name }}</td>
                            <td class="px-4 py-2 text-gray-900 dark:text-gray-100">{{ $order->menu->name }}</td>
                            <td class="px-4 py-2 text-gray-900 dark:text-gray-100">{{ $order->quantity }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('orders.toggle', $order) }}" method="POST" class="inline">
                                    @csrf @method('PATCH')
                                    <button class="px-3 py-1 rounded {{ $order->status === 'delivered' ? 'bg-green-600' : 'bg-yellow-600' }} text-white">
                                        {{ ucfirst($order->status) }}
                                    </button>
                                </form>
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('orders.edit', $order) }}" class="text-blue-600">Edit</a>
                                <form action="{{ route('orders.destroy', $order) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
