@extends('layouts.app')

@section('title', 'Insert Rating')

@section('content')
<div class="max-w-lg mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8">
    <h2 class="text-xl font-semibold text-center mb-6 text-gray-800 dark:text-gray-100">⭐ Insert New Rating</h2>

    @if ($errors->any())
        <div class="bg-red-50 dark:bg-red-900/30 border border-red-300 dark:border-red-700 text-red-600 dark:text-red-300 p-3 rounded-lg mb-5 text-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('rating.store') }}" class="space-y-5" id="rating-form">
        @csrf

        <div>
            <label class="block text-gray-700 dark:text-gray-200 font-medium mb-1">Book Author</label>
            <select name="author_id" id="author_id" required class="w-full border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">-- Select Author --</option>
                @foreach($authors as $a)
                    <option value="{{ $a->id }}">{{ $a->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-700 dark:text-gray-200 font-medium mb-1">Book Name</label>
            <select name="book_id" id="book_id" required class="w-full border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">-- Select Book --</option>
            </select>
        </div>

        <div>
            <label class="block text-gray-700 dark:text-gray-200 font-medium mb-1">Rating</label>
            <select name="rating" required class="w-full border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition">
            SUBMIT
        </button>
    </form>
</div>
@endsection
