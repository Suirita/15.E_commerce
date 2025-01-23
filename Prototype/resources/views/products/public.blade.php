<x-guest-layout>
    <div class="mt-20 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">

    <div class="container mx-auto px-4 lg:px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="h-48 w-full bg-gray-100 flex items-center justify-center overflow-hidden rounded">
                        <img class="h-full max-w-full" src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    </div>
                    <div class="pt-6">
                        <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline">
                            {{ $product->name }}
                        </a>
                        <p class="mt-2 text-sm text-gray-500">
                            {{ Str::limit($product->description, 100, '...') }}
                        </p>
                        <div class="mt-4 flex items-center justify-between">
                            <p class="text-xl font-extrabold text-gray-900">${{ number_format($product->price, 2) }}</p>
                            <button type="button" class="inline-flex items-center rounded-lg bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700">
                                Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
