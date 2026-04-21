@extends('books.layout')

@section('content')
    <section class="card">
        <div class="section-head">
            <h2>Edit Buku</h2>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')

            @include('books.partials.form', [
                'book' => $book,
                'submitLabel' => 'Simpan Perubahan',
            ])
        </form>
    </section>
@endsection