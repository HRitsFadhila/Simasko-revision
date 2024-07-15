<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::paginate(10);
        return view('karyawan.index', compact('karyawan'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'gaji' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'umur' => 'nullable|integer|min:1',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto', $fileName);
            $data['foto'] = $fileName;
        }

        Karyawan::create($data);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_karyawan' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'gaji' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'umur' => 'nullable|integer|min:1',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto', $fileName);

            if ($karyawan->foto) {
                Storage::delete('public/foto/' . $karyawan->foto);
            }

            $data['foto'] = $fileName;
        }

        $karyawan->update($data);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);

        if ($karyawan->foto) {
            Storage::delete('public/foto/' . $karyawan->foto);
        }

        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus.');
    }

    public function printEmployees()
    {
        $karyawan = Karyawan::all();
        $pdf = Pdf::loadView('karyawan.print', compact('karyawan'))
                  ->setPaper('a4', 'portrait');
        return $pdf->download('data_karyawan.pdf');
    }
}
