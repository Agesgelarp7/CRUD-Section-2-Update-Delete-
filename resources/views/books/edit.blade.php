@extends('Layouts.index')

@section('content')

<section class="container my-24 mx-auto">
  <form action="{{ route('books.update', $book->id) }}" method="POST"
    class="max-w-4xl mx-auto bg-blue-50 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 p-5">
    @csrf
    @method('PUT') <!-- Tambahkan method PUT untuk update -->

    <!-- Title -->
    <div class="relative z-0 w-full mb-5 group">
      <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}"
        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
        placeholder=" " required />
      <label for="title"
        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Title</label>
      @error('title')
      <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>

    <div class="grid md:grid-cols-2 md:gap-6">
      <!-- Category -->
      <div class="relative z-0 w-full mb-5 group">
        <select name="category" id="category"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          required>
          <option value="" disabled {{ old('category', $book->category_id) ? '' : 'selected' }}>Pilih kategori</option>
          @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ old('category', $book->category_id) == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
          </option>
          @endforeach
        </select>
        <label for="category"
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Category</label>
        @error('category')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>

      <!-- Stock -->
      <div class="relative z-0 w-full mb-5 group">
        <input type="number" name="stock" id="stock" value="{{ old('stock', $book->stock) }}" min="0"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=" " required />
        <label for="stock"
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Stock</label>
        @error('stock')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>
    </div>

    <!-- Summary -->
    <div class="relative z-0 w-full mb-5 group">
      <textarea name="summary" id="summary" rows="4"
        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
        placeholder=" " required>{{ old('summary', $book->summary) }}</textarea>
      <label for="summary"
        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Summary</label>
      @error('summary')
      <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>

    <!-- Submit Button -->
    <button type="submit"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
  </form>
</section>
@endsection
