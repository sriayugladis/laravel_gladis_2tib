<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Nama lengkap <span class="text-danger">*</span></label>
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
               value="{{ old('nama', $portofolio->nama ?? '') }}">
        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Jabatan / Professional title <span class="text-danger">*</span></label>
        <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror"
               value="{{ old('jabatan', $portofolio->jabatan ?? '') }}">
        @error('jabatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Email <span class="text-danger">*</span></label>
        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email', $portofolio->email ?? '') }}">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Telepon</label>
        <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
               value="{{ old('telepon', $portofolio->telepon ?? '') }}">
        @error('telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Alamat / Kota</label>
        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
               value="{{ old('alamat', $portofolio->alamat ?? '') }}">
        @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Foto (maks. 2 MB)</label>
    @if (!empty($portofolio->foto))
        <div class="mb-2">
            <img src="{{ asset('storage/' . $portofolio->foto) }}" alt="foto" style="height:70px" class="rounded-circle border">
        </div>
    @endif
    <input type="file" name="foto" accept="image/*" class="form-control @error('foto') is-invalid @enderror">
    @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Objective (ringkasan diri)</label>
    <textarea name="objective" rows="3" class="form-control @error('objective') is-invalid @enderror">{{ old('objective', $portofolio->objective ?? '') }}</textarea>
    @error('objective') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Pengalaman (Experience)</label>
    <textarea name="pengalaman" rows="8" class="form-control font-monospace @error('pengalaman') is-invalid @enderror"
              placeholder="Warung Digital | Web Developer Magang | 2025&#10;- Membangun fitur CRUD dengan Laravel&#10;- Merancang database MySQL&#10;&#10;Praktikum PBO | Asisten | 2024&#10;- Membantu teman memahami abstraksi">{{ old('pengalaman', $portofolio->pengalaman ?? '') }}</textarea>
    <div class="form-text">
        Baris pertama tiap blok: <code>Perusahaan | Posisi | Tahun</code>. Baris berikutnya: poin pekerjaan.
        <strong>Pisahkan antar pengalaman dengan satu baris kosong.</strong>
    </div>
    @error('pengalaman') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Pendidikan (Education)</label>
    <textarea name="pendidikan" rows="6" class="form-control font-monospace @error('pendidikan') is-invalid @enderror"
              placeholder="Politeknik Caltex Riau | Pekanbaru&#10;D4 Teknik Informatika | 2024 - sekarang&#10;&#10;SMA Negeri 1 | Pekanbaru&#10;Jurusan IPA">{{ old('pendidikan', $portofolio->pendidikan ?? '') }}</textarea>
    <div class="form-text">
        Baris pertama tiap blok: <code>Institusi | Kota</code> (ditebalkan). Baris berikutnya: jurusan, tahun, dll.
        Pisahkan antar pendidikan dengan satu baris kosong.
    </div>
    @error('pendidikan') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Skills &amp; abilities</label>
    <textarea name="skill" rows="5" class="form-control @error('skill') is-invalid @enderror"
              placeholder="PHP&#10;Laravel&#10;MySQL">{{ old('skill', $portofolio->skill ?? '') }}</textarea>
    <div class="form-text">Satu skill per baris.</div>
    @error('skill') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
</div>
