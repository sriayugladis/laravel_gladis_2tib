@extends('layouts.admin')

@section('title', 'Tambah Data')

@section('content')
<h4 class="mb-3">Tambah Data CV</h4>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.portofolio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.portofolio._form')
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.portofolio.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection