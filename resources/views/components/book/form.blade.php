<div class="mb-4">
    <label class="block font-semibold">Title</label>
    <input type="text" name="title" value="{{ old('title', $book->title ?? '') }}"
        class="w-full border rounded px-3 py-2" required>
</div>

<div class="mb-4">
    <label class="block font-semibold">Slug</label>
    <input type="text" name="slug" value="{{ old('slug', $book->slug ?? '') }}"
        class="w-full border rounded px-3 py-2" required>
</div>

<div class="mb-4">
    <label class="block font-semibold">Description</label>
    <textarea name="description" rows="4" class="w-full border rounded px-3 py-2" required>{{ old('description', $book->description ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label class="block font-semibold">Category</label>
    <select name="category_id" class="w-full border rounded px-3 py-2" required>
        <option value="">-- Select Category --</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $book->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
