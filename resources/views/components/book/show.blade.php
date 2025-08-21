<x-layout :title="$title">
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-2">{{ $book->title }}</h1>
        <p class="text-gray-600 mb-2">Category: {{ $book->category->name }}</p>
        <p class="text-gray-600 mb-4">By {{ $book->author->name }}</p>
        <p>{{ $book->description }}</p>
    </div>
</x-layout>
