@extends('layout.main')

@section('content')
<div class="container mt-4">
    <h2>Tambah Sesi</h2>
    <form action="{{ route('sesi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Sesi</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('sesi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection