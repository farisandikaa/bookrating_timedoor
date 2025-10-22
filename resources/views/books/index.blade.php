@extends('layouts.app')

@section('title', 'Book List')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-6 flex items-center gap-2">📚 Book List</h1>

    <form method="GET" class="flex flex-wrap items-center gap-4 mb-6">
        <div>
            <label class="font-medium">Show per page:</label>
            <select name="per_page" class="border dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded-lg px-3 py-1">
                @foreach($perPageOptions as $opt)
                    <option value="{{ $opt }}" {{ $opt == $perPage ? 'selected' : '' }}>{{ $opt }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center gap-2">
            <label class="font-medium">Search:</label>
            <input type="text" name="q" value="{{ $q }}" placeholder="Book name..."
                   class="border dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded-lg px-3 py-1 w-48">
            <button type="submit"
                    class="bg-blue-600 text-white font-semibold px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                SUBMIT
            </button>
        </div>
    </form>

    <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-md rounded-lg">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 dark:bg-gray-700 border-b dark:border-gray-600">
                <tr class="text-left text-gray-700 dark:text-gray-300">
                    <th class="p-3 font-medium">No</th>
                    <th class="p-3 font-medium">Book Name</th>
                    <th class="p-3 font-medium">Author</th>
                    <th class="p-3 font-medium">Avg Rating</th>
                    <th class="p-3 font-medium">Voter Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $index => $book)
                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <td class="p-3">{{ $books->firstItem() + $index }}</td>
                    <td class="p-3 text-gray-800 dark:text-gray-100">{{ $book->book_name }}</td>
                    <td class="p-3 text-gray-800 dark:text-gray-100">{{ $book->author_name }}</td>
                    <td class="p-3 font-semibold text-gray-800 dark:text-gray-100">{{ number_format($book->avg_rating, 2) }}</td>
                    <td class="p-3 text-gray-800 dark:text-gray-100">{{ $book->voter_count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $books->links('pagination::tailwind') }}
    </div>
</div>
@endsection
