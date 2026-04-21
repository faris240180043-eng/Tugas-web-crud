@extends('books.layout')

@section('content')
    <section class="card">
        <div class="section-head">
            <h2>Tambah Buku</h2>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            @include('books.partials.form', [
                'book' => null,
                'submitLabel' => 'Simpan Buku',
            ])
        </form>
    </section>
@endsection