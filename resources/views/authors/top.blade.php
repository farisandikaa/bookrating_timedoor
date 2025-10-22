@extends('layouts.app')

@section('title', 'Top Authors')

@section('content')
<div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-6 text-center">
    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-6">🏆 Top 10 Most Famous Authors</h2>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left border-collapse">
            <thead class="bg-gray-100 dark:bg-gray-700 border-b dark:border-gray-600 text-gray-600 dark:text-gray-300 uppercase text-xs">
                <tr>
                    <th class="py-3 px-4 text-center">#</th>
                    <th class="py-3 px-4">Author Name</th>
                    <th class="py-3 px-4 text-right">Total Voters</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $index => $a)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 border-b border-gray-200 dark:border-gray-700 transition">
                        <td class="py-3 px-4 text-center text-gray-800 dark:text-gray-100">{{ $index + 1 }}</td>
                        <td class="py-3 px-4 font-medium text-gray-800 dark:text-gray-100">{{ $a->name }}</td>
                        <td class="py-3 px-4 text-right text-blue-600 dark:text-blue-400 font-semibold">{{ number_format($a->voter) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
