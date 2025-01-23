<aside id="default-sidebar" class="w-64 h-full bg-gray-800 text-white border-r border-gray-700">
    <!-- Sidebar Header -->
    <div class="flex items-center flex-shrink-0 px-3 py-2">
        <div class="px-2 text-3xl font-semibold text-white">
            <a href="{{ route('products.index') }}" class="hover:text-gray-300">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
    </div>

    <div class="py-5 px-3">
        <ul class="space-y-2">
            <li>
                <a href="/Products" class="flex items-center p-2 text-base font-normal hover:bg-gray-700 rounded-lg">
                   <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                    <span class="ml-3">Products</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
