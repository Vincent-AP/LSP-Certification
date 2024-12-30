<x-layout-component>
    <div class="container mx-auto p-4">
        <form action="{{ route('borrow.store') }}" method="POST">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}"> 
            <div class="mb-3">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" value="{{ old('nama') }}" class="mt-1 p-2 w-full border rounded-md shadow-sm focus:border-blue-500 focus:outline-none">
                @error('nama')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nim" class="block text-sm font-medium text-gray-700">Nim</label>
                <input type="text" name="nim" value="{{ old('nim') }}" class="mt-1 p-2 w-full border rounded-md shadow-sm focus:border-blue-500 focus:outline-none" placeholder="Abaikan 0 pertama pada NIM">
                @error('nim')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><strong class = "text-red-500">{{ $error }}</strong></li>
                @endforeach
            </ul>
        </div>
    @endif
    <br>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
        </form>
    </div>

</x-layout-component>