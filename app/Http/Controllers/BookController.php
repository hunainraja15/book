<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Validator;

class BookController extends Controller
{
    public function index(){
        $books = Book::get();
        return view('book.index' , compact('books'));
    }
    public function upload(){
        $books = Book::get();
        return view('book.upload' , compact('books'));
    }
    
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'nullable|string|max:255',
            'publisher' => 'required|string|max:255',
            'publication_date' => 'required|date',
            'edition' => 'nullable|string|max:255',
            'language' => 'required|string|max:255',
            'pages' => 'required|integer|min:1',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'availability_status' => 'required|string|in:in_stock,out_of_stock',
            
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput()
                             ->with('error', 'Validation failed! Please check the fields.');
        }

        // Save the validated data
    Book::create($validator->validated());
        
        return redirect()->route('book.index')->with('success', 'Book added successfully!');
    }
}
