@extends('layouts.admin.app')
@section('content')

<link href="https://googleapis.com" rel="stylesheet">
<style>
    body, .content { background-color: #FFF8FA !important; font-family: 'Quicksand', sans-serif; }
    .pink-banner { background: linear-gradient(135deg, #FFD6E4 0%, #FFB5CE 100%); border-radius: 26px; padding: 1.75rem 2rem; box-shadow: 0 10px 25px rgba(255, 143, 179, 0.22); }
    .pink-banner h1 { color: #7A2E4D; font-weight: 700; }
    .pink-banner p { color: #964867; font-weight: 500; }
    .btn-pink-primary { background: #FFFFFF; color: #D64B82 !important; border: 2px solid #FFB3CC; border-radius: 50px; padding: 10px 22px; font-weight: 700; }
    .btn-pink-primary:hover { background: #FF6B9E; color: #FFFFFF !important; border-color: #FF6B9E; }
    .card-soft-pink { background: #FFFFFF; border-radius: 28px !important; border: 1.5px solid #FFE3EC !important; box-shadow: 0 12px 32px rgba(255, 166, 196, 0.14) !important; }
    .input-soft-pink { border-radius: 50px !important; border: 1.5px solid #FFD1E0 !important; background-color: #FFFBFD !important; color: #7A2E4D !important; font-weight: 600; }
    .btn-search-pink { background: linear-gradient(135deg, #FF94B8, #FF70A2) !important; color: #FFFFFF !important; border: none !important; border-radius: 0 50px 50px 0 !important; }
    .btn-clear-pink { border-radius: 50px !important; background: #FFEAF1 !important; color: #D64B82 !important; border: 1.5px solid #FFC2D6 !important; font-weight: 700; margin-left: 8px !important; }
    #table-pelanggan { border-collapse: separate; border-spacing: 0 8px; }
    #table-pelanggan thead th { background-color: #FFEBF2 !important; color: #B84270 !important; font-weight: 700; padding: 14px 16px; }
    #table-pelanggan tbody tr { background-color: #FFF9FB; }
    #table-pelanggan tbody tr:hover { background-color: #FFEFF5; }
    #table-pelanggan tbody td { border: none !important; color: #5E3446; font-weight: 600; padding: 14px 16px; }
    .badge-female { background-color: #FFD6E5; color: #C93B72; padding: 6px 14px; border-radius: 50px; font-weight: 700; font-size: 0.78rem; }
    .badge-male { background-color: #E3F0FF; color: #4A7BB8; padding: 6px 14px; border-radius: 50px; font-weight: 700; font-size: 0.78rem; }
    .btn-action-edit { background: #FFF0F5; color: #D64B82; border: 1px solid #FFC4D8; border-radius: 50px; padding: 5px 14px; font-size: 0.8rem; font-weight: 700; }
    .btn-action-delete { background: #FFE5EC; color: #E03E6B; border: 1px solid #FFB8CB; border-radius: 50px; padding: 5px 14px; font-size: 0.8rem; font-weight: 700; }
    .pagination .page-link { border-radius: 50px !important; margin: 0 3px; border: 1.5px solid #FFD1E0; color: #C95B86; font-weight: 700; }
    .pagination .page-item.active .page-link { background: linear-gradient(135deg, #FF94B8, #FF6B9E) !important; border-color: #FF6B9E !important; color: #FFFFFF !important; }
</style>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card card-soft-pink mb-4">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <form method="GET" action="{{ route('admin.pelanggan.index') }}" class="mb-4">
                        <div class="row g-2 align-items-center">
                            <div class="col-md-2">
                                <select name="gender" class="form-select input-soft-pink" onchange="this.form.submit()">
                                    <option value="">All Genders</option>
                                    <option value="Male" {{ request('gender')=='Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ request('gender')=='Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control input-soft-pink" style="border-radius: 50px 0 0 50px !important;" value="{{ request('search') }}" placeholder="Cari nama atau email...">
                                    <button type="submit" class="btn btn-search-pink">Cari</button>
                                    @if(request('search'))
                                        <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}" class="btn btn-clear-pink">Clear</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>

                    <table id="table-pelanggan" class="table table-centered table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th class="border-0">First Name</th>
                                <th class="border-0">Last Name</th>
                                <th class="border-0">Birthday</th>
                                <th class="border-0">Gender</th>
                                <th class="border-0">Email</th>
                                <th class="border-0">Phone</th>
                                <th class="border-0 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataPelanggan as $item)
                            <tr>
                                <td>{{ $item->first_name }}</td>
                                <td>{{ $item->last_name }}</td>
                                <td>{{ $item->birthday }}</td>
                                <td>
                                    @if($item->gender == 'Female')
                                        <span class="badge-female">Female</span>
                                    @else
                                        <span class="badge-male">{{ $item->gender }}</span>
                                    @endif
                                </td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.pelanggan.edit', $item->pelanggan_id) }}" class="btn btn-action-edit me-1">Edit</a>
                                    <form action="{{ route('admin.pelanggan.destroy', $item->pelanggan_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-action-delete">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $dataPelanggan->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
