<x-layout-component>
    <div class="container mx-auto p-4 max-w-5xl ml-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @foreach ($books as $book)
                <div class="bg-white rounded-lg shadow-md p-4 flex flex-col">
                    <img src="{{ asset('Open book coloring vector image on VectorStock.jpg') }}" alt="Book Cover" class="w-full h-30 object-cover rounded-lg">
                    <div class="mt-4 text-center">
                        <h3 class="text-lg font-medium text-gray-900">{{ $book->title }}</h3>
                        <p class="text-gray-600">{{ $book->author }}</p>
                        <p class="text-gray-600">{{ $book->year }}</p>
                    </div>
                    <br>
                    @if ($errors->has("book_{$book->id}"))
                        <div class="bg-red-500 text-white p-3 rounded-md">
                            {{ $errors->first("book_{$book->id}") }}
                        </div>
                    @endif
                    <div class="flex flex-col space-y-2 mt-4">
                        <a href="/books/{{ $book->id }}/edit" 
                           class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-400">
                            Edit Buku
                        </a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-4 py-2 rounded-md bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-900 w-full">
                                Hapus Buku
                            </button>
                        </form>
                        <a href="{{ route('formpinjam', ['book_id' => $book->id]) }}" 
                           class="px-4 py-2 rounded-md bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-600 w-full">
                            Pinjam Buku
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout-component>



                        
                