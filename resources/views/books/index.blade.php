@extends('books.layout')

@section('content')
    <section class="card">
        <div class="section-head">
            <h2>Daftar Buku</h2>
            <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku</a>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->published_year ?? '-' }}</td>
                            <td>{{ $book->stock }}</td>
                            <td>
                                <div class="cell-actions">
                                    <a href="{{ route('books.edit', $book) }}" class="btn btn-secondary">Edit</a>

                                    <form action="{{ route('books.destroy', $book) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; color: #6b7280;">Belum ada data buku.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection