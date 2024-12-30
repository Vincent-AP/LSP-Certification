<x-layout-component>
  <div class="container mx-auto p-4 max-w-5xl">
      <h1 class="text-2xl font-bold mb-4">Daftar Buku yang Dipinjam</h1>

      <table class="table-auto w-full border-collapse border border-gray-300">
          <thead>
              <tr class="bg-gray-200">
                  <th class="border border-gray-300 px-4 py-2">Buku</th>
                  <th class="border border-gray-300 px-4 py-2">Nama Peminjam</th>
                  <th class="border border-gray-300 px-4 py-2">Induk Mahasiswa</th>
                  <th class="border border-gray-300 px-4 py-2">Penulis</th>
                  <th class="border border-gray-300 px-4 py-2">Tanggal Pinjam</th>
                  <th class="border border-gray-300 px-4 py-2">Tanggal Harus Dikembalikan</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($borrows as $borrowed)
                  <tr>
                      <td class="border border-gray-300 px-4 py-2">{{ $borrowed->book->title }}</td>
                      <td class="border border-gray-300 px-4 py-2">{{ $borrowed->nama }}</td>
                      <td class="border border-gray-300 px-4 py-2">{{ $borrowed->nim }}</td>
                      <td class="border border-gray-300 px-4 py-2">{{ $borrowed->book->author }}</td>
                      <td class="border border-gray-300 px-4 py-2">{{ $borrowed->borrowed_at}}</td>
                      <td class="border border-gray-300 px-4 py-2">{{ $borrowed->due_date}}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</x-layout-component>

