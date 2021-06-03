<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{ url('/') }}" class="@if(\Illuminate\Support\Facades\Request::path()== 'welcome' | \Illuminate\Support\Facades\Request::path()== '/') bg-gray-900 @endif text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                        <a href="{{ url('/products') }}" class="@if(\Illuminate\Support\Facades\Request::path()== 'products') bg-gray-900 @endif text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Products</a>
                        <a href="{{ url('/customer') }}" class="@if(\Illuminate\Support\Facades\Request::path()== 'customer') bg-gray-900 @endif text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Customers</a>
                        <a href="{{ url('/settings') }}" class="@if(\Illuminate\Support\Facades\Request::path()== 'settings') bg-gray-900 @endif text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Settings</a>
                        <a href="{{ url('/wishlist') }}" class="@if(\Illuminate\Support\Facades\Request::path()== 'settings') bg-gray-900 @endif text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Test</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
