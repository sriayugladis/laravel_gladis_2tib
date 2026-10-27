@extends('layouts.admin')

@section('title', 'Edit Data')

@section('content')
<h4 class="mb-3">Edit Data CV</h4>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.portofolio.update', $portofolio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.portofolio._form')
            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('admin.portofolio.show', $portofolio->id) }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
