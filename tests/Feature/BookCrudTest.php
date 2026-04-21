<?php

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('halaman daftar buku dapat diakses', function () {
    Book::factory()->create([
        'title' => 'Laskar Pelangi',
    ]);

    $response = $this->get(route('books.index'));

    $response->assertSuccessful();
    $response->assertSee('Laskar Pelangi');
});

test('pengguna dapat menambah buku', function () {
    $response = $this->post(route('books.store'), [
        'title' => 'Atomic Habits',
        'author' => 'James Clear',
        'published_year' => 2018,
        'stock' => 7,
    ]);

    $response->assertRedirect(route('books.index'));

    $this->assertDatabaseHas('books', [
        'title' => 'Atomic Habits',
        'author' => 'James Clear',
        'published_year' => 2018,
        'stock' => 7,
    ]);
});

test('pengguna dapat mengubah buku', function () {
    $book = Book::factory()->create();

    $response = $this->put(route('books.update', $book), [
        'title' => 'Bumi Manusia',
        'author' => 'Pramoedya Ananta Toer',
        'published_year' => 1980,
        'stock' => 4,
    ]);

    $response->assertRedirect(route('books.index'));

    $this->assertDatabaseHas('books', [
        'id' => $book->id,
        'title' => 'Bumi Manusia',
        'author' => 'Pramoedya Ananta Toer',
        'published_year' => 1980,
        'stock' => 4,
    ]);
});

test('pengguna dapat menghapus buku', function () {
    $book = Book::factory()->create();

    $response = $this->delete(route('books.destroy', $book));

    $response->assertRedirect(route('books.index'));
    $this->assertDatabaseMissing('books', [
        'id' => $book->id,
    ]);
});
