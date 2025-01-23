<div class="p-4 bg-white rounded-lg shadow sm:p-5">
    <!-- Modal header -->
    <div class="flex justify-between items-center pb-4 mb-4 border-b">
        <h3 class="text-lg font-semibold text-gray-900">
            Add Product
        </h3>
    </div>
    <!-- Modal body -->
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border text-sm rounded-lg block w-full p-2.5" placeholder="Type product name" required>
            </div>
            <div>
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                <input type="number" name="price" id="price" class="bg-gray-50 border text-sm rounded-lg block w-full p-2.5" placeholder="$2999" required>
            </div>
            <div class="sm:col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                <textarea name="description" id="description" rows="4" class="bg-gray-50 border text-sm rounded-lg block w-full p-2.5" placeholder="Write product description" required></textarea>
            </div>
        </div>
        <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 rounded-lg text-sm px-5 py-2.5">
            Add new product
        </button>
    </form>
</div>
