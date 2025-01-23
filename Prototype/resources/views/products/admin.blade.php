<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <!-- Card Header -->
                <div class="p-4 flex justify-between items-center">
                    <h2 class="text-3xl font-semibold leading-6 text-gray-600">
                        Products
                    </h2>
                    <!-- Modal toggle -->
                    <button id="defaultModalButton" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center flex gap-1" type="button">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Add product
                    </button>
                </div>

                <!-- Table Container -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3">Product name</th>
                                <th scope="col" class="px-4 py-3">Price</th>
                                <th scope="col" class="px-4 py-3">Description</th>
                                <th scope="col" class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="border-b">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900">
                                        {{ $product->name }}
                                    </th>
                                    <td class="px-4 py-3">
                                        ${{ number_format($product->price, 2) }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $product->description }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:bg-gray-200 rounded-lg text-sm p-1.5">
                                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            @if ($products->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center py-4">
                                        No products found.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="py-3 px-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-50">
            <!-- Dynamic Content Loaded Here -->
            <div id="modalContent"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            // Open Modal and Load Content
            $('#defaultModalButton').on('click', function () {
                const formUrl = "{{ route('products.create') }}";

                // Fetch and inject the content dynamically
                $.ajax({
                    url: formUrl,
                    type: 'GET',
                    success: function (response) {
                        $('#modalContent').html(response); // Inject form content
                        $('#defaultModal').removeClass('hidden'); // Show modal
                    },
                    error: function () {
                        alert('Failed to load the form. Please try again.');
                    }
                });
            });

            // Close Modal
            $(document).on('click', '[data-modal-toggle="defaultModal"], #defaultModal', function (e) {
                if (e.target.id === 'defaultModal' || $(e.target).data('modal-toggle') === 'defaultModal') {
                    $('#defaultModal').addClass('hidden');
                    $('#modalContent').html(''); // Clear modal content to prevent duplication
                }
            });
        });
    </script>
</x-app-layout>
