<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = 'Portofolio_1187';

    protected $fillable = [
        'nama', 'jabatan', 'email', 'telepon', 'alamat', 'foto',
        'objective', 'pengalaman', 'pendidikan', 'skill',
    ];

    // Dipakai di halaman CV
    public function daftarPengalaman(): array
    {
        return $this->pecahBlok($this->pengalaman);
    }

    public function daftarPendidikan(): array
    {
        return $this->pecahBlok($this->pendidikan);
    }

    public function daftarSkill(): array
    {
        if (!$this->skill) {
            return [];
        }
        return array_values(array_filter(array_map('trim', preg_split('/\R/', $this->skill))));
    }

    /**
     * Memecah teks menjadi blok. Blok dipisah baris kosong.
     * Baris pertama blok = judul, baris berikutnya = isi (poin).
     */
    private function pecahBlok(?string $teks): array
    {
        if (!$teks || !trim($teks)) {
            return [];
        }

        $hasil = [];
        foreach (preg_split('/\R\s*\R/', trim($teks)) as $blok) {
            $baris = array_values(array_filter(array_map('trim', preg_split('/\R/', $blok))));
            if (!$baris) {
                continue;
            }
            $judul = array_shift($baris);
            $isi = array_map(fn ($b) => preg_replace('/^[-•*]\s*/u', '', $b), $baris);
            $hasil[] = ['judul' => $judul, 'isi' => $isi];
        }

        return $hasil;
    }
}