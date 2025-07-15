@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Tambah Data Penjualan</h3>

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

        <form action="{{ route('penjualan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                    value="{{ old('nama_produk') }}" required>
            </div>

            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Slug</label>
                <input type="text" class="form-control" id="nama_slug" name="nama_slug" value="{{ old('nama_slug') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori Produk</label>
                <select class="form-select" id="kategori" name="kategori" aria-placeholder="Kategori Produk">
                    <option disabled>-- Pilih Kategori Produk</option>
                    <option value="digital_printing">Digital Printing</option>
                    <option value="spanduk">Spanduk</option>
                    <option value="poster">Poster</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto Produk</label>
                <input class="form-control" type="file" id="foto_produk" name="foto_produk" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="deksripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" required rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
