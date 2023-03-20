<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookModel;
use App\Models\AuthorModel;
use App\Models\RatingModel;

class BookController extends Controller
{
    public function index()
    {
        $results = BookModel::selectRaw('COUNT(rating.id_rating) AS Voters, AVG(rating.rating) AS average, books.books_name, category.category, authors.name')
            ->join('rating', 'books.books_id', '=', 'rating.book_id')
            ->join('category', 'books.category_id', '=', 'category.category_id')
            ->join('authors', 'books.author_id', '=', 'authors.author_id')
            ->groupBy('books.books_name')
            ->orderByRaw('AVG(rating.rating) DESC')
            ->get();

        //dd($results);

        return view('books', compact(['results']));
    }

    public function author()
    {
        $results = BookModel::selectRaw('COUNT(rating.id_rating) AS voters, authors.name AS author_name')
            ->join('rating', 'books.books_id', '=', 'rating.book_id')
            ->join('authors', 'books.author_id', '=', 'authors.author_id')
            ->where('rating.rating', '>', 5)
            ->groupBy('authors.name')
            ->havingRaw('COUNT(rating.id_rating) > 10')
            ->orderByDesc('voters')
            ->get();

        //dd($results[0]);

        return view('author', compact(['results']));

    }

    public function rating()
    {
        return view('rating');
    }

    public function authorData()
    {
        $author = AuthorModel::get();

        return $author;
    }
    public function bookData(Request $request)
    {
        $author = BookModel::where('author_id', $request->authorId)->get();

        return $author;
    }

    public function submit(Request $request)
    {
        $insert = RatingModel::create([
            'rating' => intval($request->rating),
            'book_id' => intval($request->book)
        ]);

        dd($insert);
    }
}