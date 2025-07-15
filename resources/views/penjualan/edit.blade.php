@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Edit Data Penjualan</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('penjualan.update', $penjualan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                    value="{{ old('nama_produk', $penjualan->nama_produk) }}" required>
            </div>
            <div class="mb-3">
                <label for="nama_slug" class="form-label">Nama Slug</label>
                <input type="text" class="form-control" id="nama_slug" name="nama_slug"
                    value="{{ old('nama_slug', $penjualan->nama_slug) }}" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga"
                    value="{{ old('harga', $penjualan->harga) }}" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori Produk</label>
                <select class="form-control" id="kategori" name="kategori">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="digital_printing"
                        {{ old('kategori', $penjualan->kategori ?? '') == 'digital_printing' ? 'selected' : '' }}>Digital
                        Printing</option>
                    <option value="spanduk"
                        {{ old('kategori', $penjualan->kategori ?? '') == 'spanduk' ? 'selected' : '' }}>Spanduk</option>
                    <option value="poster" {{ old('kategori', $penjualan->kategori ?? '') == 'poster' ? 'selected' : '' }}>
                        Poster</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Produk</label>
                <input class="form-control" type="file" id="foto" name="foto" accept="image/*">
                @if ($penjualan->foto_produk)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $penjualan->foto_produk) }}" width="120"
                            alt="Foto Produk Sebelumnya">
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="deksripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" type="text" id="deskripsi" name="deskripsi" required rows="3">{{ old('deskripsi', $penjualan->deskripsi) }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
