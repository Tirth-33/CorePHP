<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Add Order</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg">
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Customer</label>
                        <select name="customer_id" class="w-full border rounded px-3 py-2 dark:bg-gray-700 dark:text-white" required>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Menu</label>
                        <select name="menu_id" class="w-full border rounded px-3 py-2 dark:bg-gray-700 dark:text-white" required>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }} - ${{ $menu->price }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Quantity</label>
                        <input type="number" name="quantity" value="1" class="w-full border rounded px-3 py-2 dark:bg-gray-700 dark:text-white" required>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
