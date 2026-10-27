<div>
    <!-- Be present above all else. - Naval Ravikant -->
</div>
@extends('layouts.admin')

@section('title', 'CV ' . $portofolio->nama)

@section('content')
<style>
    .cv { background:#fff; max-width:820px; margin:0 auto; padding:48px 56px;
          font-family: Arial, Helvetica, sans-serif; color:#111; box-shadow:0 2px 12px rgba(0,0,0,.12); }
    .cv h1 { font-weight:800; font-size:2.6rem; margin:0; }
    .cv .jabatan { letter-spacing:2px; text-transform:uppercase; font-size:1.1rem; margin:6px 0 10px; }
    .cv .kontak { font-weight:700; font-size:.95rem; }
    .cv .foto { width:125px; height:125px; border-radius:50%; object-fit:cover; border:2px solid #d1d5db; }
    .cv h2 { font-size:1.4rem; font-weight:800; border-bottom:1.5px solid #111;
             padding-bottom:4px; margin:34px 0 12px; }
    .cv .baris { display:flex; justify-content:space-between; font-weight:700; font-size:.95rem; }
    .cv ul { margin:4px 0 16px; padding-left:44px; }
    .cv li { font-size:.95rem; line-height:1.7; }
    .cv p  { font-size:.95rem; line-height:1.7; margin:0; }

    @media print {
        nav.navbar, .no-print, .alert { display:none !important; }
        body { background:#fff !important; }
        .cv { box-shadow:none; padding:0; max-width:100%; }
    }
</style>

<div class="no-print d-flex justify-content-between mb-3" style="max-width:820px;margin:0 auto">
    <a href="{{ route('admin.portofolio.index') }}" class="btn btn-secondary">&larr; Kembali ke daftar</a>
    <div>
        <a href="{{ route('admin.portofolio.edit', $portofolio->id) }}" class="btn btn-warning">Edit</a>
        <button type="button" onclick="window.print()" class="btn btn-dark">Cetak / Simpan PDF</button>
    </div>
</div>

<div class="cv">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1>{{ $portofolio->nama }}</h1>
            <div class="jabatan">{{ $portofolio->jabatan }}</div>
            @php $kontak = array_filter([$portofolio->alamat, $portofolio->telepon]); @endphp
            <div class="kontak">
                {{ implode(' | ', $kontak) }}{{ count($kontak) ? ' | ' : '' }}<a href="mailto:{{ $portofolio->email }}">{{ $portofolio->email }}</a>
            </div>
        </div>
        @if ($portofolio->foto)
            <img src="{{ asset('storage/' . $portofolio->foto) }}" alt="Foto {{ $portofolio->nama }}" class="foto">
        @endif
    </div>

    {{-- OBJECTIVE --}}
    @if ($portofolio->objective)
        <h2>Objective</h2>
        <p>{{ $portofolio->objective }}</p>
    @endif

    {{-- EXPERIENCE --}}
    @if (count($portofolio->daftarPengalaman()))
        <h2>Experience</h2>
        @foreach ($portofolio->daftarPengalaman() as $x)
            @php
                $bagian = array_map('trim', explode('|', $x['judul']));
                $tahun  = count($bagian) > 2 ? array_pop($bagian) : null;
            @endphp
            <div class="baris">
                <span>{{ implode(' | ', $bagian) }}</span>
                <span>{{ $tahun }}</span>
            </div>
            @if (count($x['isi']))
                <ul>
                    @foreach ($x['isi'] as $poin)
                        <li>{{ $poin }}</li>
                    @endforeach
                </ul>
            @endif
        @endforeach
    @endif

    {{-- EDUCATION --}}
    @if (count($portofolio->daftarPendidikan()))
        <h2>Education</h2>
        @foreach ($portofolio->daftarPendidikan() as $x)
            @php $bagian = array_map('trim', explode('|', $x['judul'], 2)); @endphp
            <div class="mb-3">
                <p>
                    <strong>{{ $bagian[0] }}</strong>{{ isset($bagian[1]) ? ' – ' . $bagian[1] : '' }}
                </p>
                @foreach ($x['isi'] as $baris)
                    <p>{{ $baris }}</p>
                @endforeach
            </div>
        @endforeach
    @endif

    {{-- SKILLS --}}
    @if (count($portofolio->daftarSkill()))
        <h2>Skills &amp; abilities</h2>
        <ul>
            @foreach ($portofolio->daftarSkill() as $s)
                <li>{{ $s }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection
