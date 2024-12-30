<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script> 
</head>
<body class="h-full">
    <div class="min-h-full flex flex-col">
        <!-- Navigation Bar -->
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <!-- Navigation Links -->
                    <div class="hidden md:block"> 
                        <div class="flex items-baseline space-x-6">
                            <a href="/dashboard" class="rounded-md py-2 px-2 text-sm font-medium bg-gray-800 text-gray-400 hover:bg-gray-500 hover:text-white">Add Books</a>
                            <a href="/books" class="rounded-md py-2 px-2 text-sm font-medium bg-gray-800 text-gray-400 hover:bg-gray-500 hover:text-white">Book List</a>
                            <a href="/borrow" class="rounded-md py-2 px-2 text-sm font-medium bg-gray-800 text-gray-400 hover:bg-gray-500 hover:text-white">List Peminjam</a>
                        </div>
                    </div>
                    <!-- User Actions -->
                    <div class="hidden md:block">
                        <div class="flex items-baseline justify-end space-x-6"> 
                            <a href="/register" class="rounded-md py-2 px-2 text-sm font-medium bg-gray-800 text-gray-400 hover:bg-gray-500 hover:text-white">Register</a>
                            <a href="/login" class="rounded-md py-2 px-2 text-sm font-medium bg-gray-800 text-gray-400 hover:bg-gray-500 hover:text-white">Login</a>
                            <form action="/logout" method = "POST">
                            @csrf
                            <button class="rounded-md py-2 px-2 text-sm font-medium bg-gray-800 text-gray-400 hover:bg-gray-500 hover:text-white">Logout</button>
                        </form>
                        </div>
                    </div>
                    <!-- Mobile Menu Button -->
                    <div class="md:hidden flex items-center"> 
                        <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Main Content -->
        <main class="flex-grow bg-gray-100">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <p class="mt-2 text-gray-600">{{$slot}}</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>