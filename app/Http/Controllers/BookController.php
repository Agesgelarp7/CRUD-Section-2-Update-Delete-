<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		    // Before
		    // $books = Book::all();
		    // After
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =Category::all();
        return view('books.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'summary' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('books-'  . date('Y') . date('m') . date('d'));
        }

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('images'), $imageName);
        // }

        Book::create([
            'title' => $validated['title'],
            'category_id' => $validated['category'], // Foreign key field
            'stock' => $validated['stock'],
            'summary' => $validated['summary'],
            'image' => $validated['image'],
        ]);

        return redirect()->route('books.index')->with('success', 'Book has been successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    /**
* Buat code untuk validasi inputan user
*/

$validated = $request->validate([
    'title' => 'required|string|max:255',
    'category' => 'required|exists:categories,id',
    'stock' => 'required|integer|min:0',
    'summary' => 'required|string|max:1000',
]);
/**
* Ambil buku sesuai dengan id yang dikirim / lalu update berdasarkan perubahan yang dikirimkan user
*/
$book = Book::findOrFail($id);

$book->update([
   'title' => $validated['title'],
   'category_id' => $validated['category'], // Foreign key field
   'stock' => $validated['stock'],
   'summary' => $validated['summary'],
   'image' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg'
]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book has been successfully deleted!');
    }

}
