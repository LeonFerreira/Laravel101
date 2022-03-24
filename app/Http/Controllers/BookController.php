<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::all();

        return view('index', compact('books'));
    }

    public function create(): View
    {
        $users = User::all();

        return view('create', compact('users'));
    }

    public function store(BookRequest $request): RedirectResponse
    {
        Book::create($request->all());

        return redirect('books');
    }

    public function show(int $id): View
    {
        $book = Book::find($id);

        return view('show', compact('book'));
    }

    public function edit(int $id): View
    {
        $book = Book::find($id);

        $users = User::all();

        return view('create', compact('book', 'users'));
    }

    public function update(BookRequest $request, int $id): RedirectResponse
    {
        Book::find($id)->update($request->all());

        return redirect('books');
    }

    public function destroy(int $id): RedirectResponse
    {
        Book::destroy($id);

        return redirect('books');
    }
}
