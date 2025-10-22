<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | BookRating</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 transition-colors duration-300 min-h-screen flex flex-col">


    <nav class="bg-white dark:bg-gray-800 shadow-md fixed w-full z-10 top-0 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-blue-600 dark:text-blue-400 tracking-wide">📘 BookRating</h1>
            <div class="flex space-x-6">
                <a href="{{ route('books.index') }}" class="text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition">Books</a>
                <a href="{{ route('authors.top') }}" class="text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition">Top Authors</a>
                <a href="{{ route('rating.create') }}" class="text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 font-medium transition">Insert Rating</a>
            </div>

            
            <button id="theme-toggle" class="ml-4 p-2 rounded-lg bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                <span id="theme-toggle-light-icon" class="hidden">🌙</span>
                <span id="theme-toggle-dark-icon" class="hidden">☀️</span>
            </button>
        </div>
    </nav>

    <main class="flex-1 pt-24 pb-12 px-6">
        <div class="max-w-7xl mx-auto">
            @yield('content')
        </div>
    </main>


    <footer class="bg-white dark:bg-gray-800 border-t dark:border-gray-700 text-center text-gray-500 dark:text-gray-400 py-4 transition-colors duration-300">
        <a href="https://farisandika.vercel.app" class="text-sm">&copy; {{ date('Y') }} Faris Andika Putra. All rights reserved.</a>
    </footer>

</body>
</html>
