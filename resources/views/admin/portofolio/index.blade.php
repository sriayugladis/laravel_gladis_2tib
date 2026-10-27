@extends('layouts.admin')

@section('title', 'Data CV')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Data CV / Portofolio</h4>
    <a href="{{ route('admin.portofolio.create') }}" class="btn btn-primary">+ Tambah Data</a>
</div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if ($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" style="height:40px;width:40px;object-fit:cover" class="rounded-circle">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->email }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.portofolio.show', $item->id) }}" class="btn btn-info btn-sm">Lihat CV</a>
                            <a href="{{ route('admin.portofolio.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.portofolio.destroy', $item->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted py-4">Belum ada data</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection