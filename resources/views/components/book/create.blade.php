<form action="{{ $book->id ?? '' ? route('books.update', $book->id) : route('books.store') }}" method="POST"
    id="post-form" enctype="multipart/form-data">
    @csrf
    @if (isset($book) && $book->id)
        @method('PUT')
    @endif

    <div class="space-y-4">

        <!-- Title -->
        <div>
            <label for="title" class="block font-medium">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $book->title ?? '') }}"
                class="w-full border rounded px-3 py-2">
            @error('title')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Category -->
        <div>
            <label for="category" class="block mb-2 font-medium">Category</label>
            <select name="category_id" id="category" class="w-full border rounded px-3 py-2">
                <option value="">-- Select Category --</option>
                @foreach (App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $book->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block font-medium">Description</label>
            <textarea name="description" id="description" rows="4" class="w-full border rounded px-3 py-2">{{ old('description', $book->description ?? '') }}</textarea>
            @error('description')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- File Upload -->
        <div>
            <label for="file" class="block font-medium">Book File</label>
            <input type="file" name="file" id="file" class="w-full border rounded px-3 py-2">
            @if (isset($book) && $book->file_path)
                <p class="mt-1 text-gray-600">Current file:
                    <a href="{{ asset('storage/' . $book->file_path) }}" target="_blank"
                        class="text-blue-600 underline">
                        View / Download
                    </a>
                </p>
            @endif
            @error('file')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex gap-2">
            <button type="submit"
                class="text-white bg-primary-700 hover:bg-primary-800 font-medium rounded-lg px-5 py-2.5 flex items-center">
                <svg class="mr-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                {{ isset($book) ? 'Update Book' : 'Add New Book' }}
            </button>

            <a href="{{ route('books.index') }}"
                class="text-red-600 border border-red-600 hover:bg-red-600 hover:text-white font-medium rounded-lg px-5 py-2.5 flex items-center">
                Cancel
            </a>
        </div>
    </div>
</form>

<script>
    // Example: initialize your rich text editor (e.g., Quill)
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    // Copy content from Quill to textarea on submit
    document.getElementById('post-form').onsubmit = function() {
        document.getElementById('content').value = quill.root.innerHTML;
    };
</script>
