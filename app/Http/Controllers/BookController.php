<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::query()
            ->latest('id')
            ->get();

        return view('books.index', [
            'books' => $books,
        ]);
    }

    public function create(): View
    {
        return view('books.create');
    }

    public function store(StoreBookRequest $request): RedirectResponse
    {
        Book::query()->create($request->validated());

        return redirect()
            ->route('books.index')
            ->with('status', 'Buku berhasil ditambahkan.');
    }

    public function edit(Book $book): View
    {
        return view('books.edit', [
            'book' => $book,
        ]);
    }

    public function update(UpdateBookRequest $request, Book $book): RedirectResponse
    {
        $book->update($request->validated());

        return redirect()
            ->route('books.index')
            ->with('status', 'Buku berhasil diperbarui.');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('status', 'Buku berhasil dihapus.');
    }
}
