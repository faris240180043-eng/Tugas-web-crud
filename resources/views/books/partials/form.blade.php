@if ($errors->any())
    <div class="alert alert-error">
        Data belum valid.
        <ul class="error-list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-grid">
    <div class="field field-full">
        <label for="title">Judul</label>
        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title', data_get($book, 'title')) }}"
            required
            maxlength="255"
        >
        @error('title')
            <span class="error-text">{{ $message }}</span>
        @enderror
    </div>

    <div class="field field-full">
        <label for="author">Penulis</label>
        <input
            type="text"
            id="author"
            name="author"
            value="{{ old('author', data_get($book, 'author')) }}"
            required
            maxlength="255"
        >
        @error('author')
            <span class="error-text">{{ $message }}</span>
        @enderror
    </div>

    <div class="field">
        <label for="published_year">Tahun Terbit</label>
        <input
            type="number"
            id="published_year"
            name="published_year"
            value="{{ old('published_year', data_get($book, 'published_year')) }}"
            min="1900"
            max="{{ now()->year + 1 }}"
        >
        @error('published_year')
            <span class="error-text">{{ $message }}</span>
        @enderror
    </div>

    <div class="field">
        <label for="stock">Stok</label>
        <input
            type="number"
            id="stock"
            name="stock"
            value="{{ old('stock', data_get($book, 'stock', 0)) }}"
            min="0"
            required
        >
        @error('stock')
            <span class="error-text">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-actions">
    <button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
</div>