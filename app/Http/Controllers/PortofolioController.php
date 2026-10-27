<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    private array $rules = [
        'nama'       => 'required|max:100',
        'jabatan'    => 'required|max:100',
        'email'      => 'required|email|max:100',
        'telepon'    => 'nullable|max:30',
        'alamat'     => 'nullable|max:150',
        'foto'       => 'nullable|image|max:2048',
        'objective'  => 'nullable',
        'pengalaman' => 'nullable',
        'pendidikan' => 'nullable',
        'skill'      => 'nullable',
    ];


    public function index()
    {
        $data = Portofolio::latest()->get();
        return view('admin.portofolio.index', compact('data'));
    }

    // CREATE: tampilkan form
    public function create()
    {
        return view('admin.portofolio.create');
    }

    // CREATE: simpan data, lalu tampilkan CV
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);

        unset($validated['foto']);
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('portofolio', 'public');
        }

        $portofolio = Portofolio::create($validated);

        return redirect()->route('admin.portofolio.show', $portofolio->id)
                         ->with('success', 'Data berhasil disimpan. Berikut tampilan CV-nya.');
    }

    // READ: tampilan CV (satu data)
    public function show(Portofolio $portofolio)
    {
        return view('admin.portofolio.show', compact('portofolio'));
    }

    // UPDATE: tampilkan form edit
    public function edit(Portofolio $portofolio)
    {
        return view('admin.portofolio.edit', compact('portofolio'));
    }

    // UPDATE: simpan perubahan, lalu tampilkan CV
    public function update(Request $request, Portofolio $portofolio)
    {
        $validated = $request->validate($this->rules);

        unset($validated['foto']);
        if ($request->hasFile('foto')) {
            if ($portofolio->foto) {
                Storage::disk('public')->delete($portofolio->foto);
            }
            $validated['foto'] = $request->file('foto')->store('portofolio', 'public');
        }

        $portofolio->update($validated);

        return redirect()->route('admin.portofolio.show', $portofolio->id)
                         ->with('success', 'Data berhasil diperbarui.');
    }

    // DELETE
    public function destroy(Portofolio $portofolio)
    {
        if ($portofolio->foto) {
            Storage::disk('public')->delete($portofolio->foto);
        }

        $portofolio->delete();

        return redirect()->route('admin.portofolio.index')
                         ->with('success', 'Data berhasil dihapus.');
    }
}