<x-layout-component>
    <div class="bg-white p-4 rounded-lg shadow-md">
        <div class="flex justify-between items-center">
            <h4 class="text-lg font-semibold">Add Product with Image</h4>
            <a href="{{ url('books') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Back</a>
        </div>

        <div class="card-body">
            <form action="{{ url('update-books'.$book->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" value="{{ old('title', $book->title) }}" class="mt-1 p-2 w-full border rounded-md shadow-sm focus:border-blue-500 focus:outline-none">
                    @error('title')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="block text-sm font-medium text-gray-700">Author</label>
                    <input type="text" name="author" value="{{ old('author', $book->author) }}" class="mt-1 p-2 w-full border rounded-md shadow-sm focus:border-blue-500 focus:outline-none">
                    @error('author')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="block text-sm font-medium text-gray-700">Year</label>
                    <input type="text" name="year" value="{{ old('year', $book->year) }}" class="mt-1 p-2 w-full border rounded-md shadow-sm focus:border-blue-500 focus:outline-none">
                    @error('year')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Books</button>
                </div>
            </form>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
</x-layout-component>