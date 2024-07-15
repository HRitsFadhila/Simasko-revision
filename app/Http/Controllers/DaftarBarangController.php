<?php

namespace App\Http\Controllers;

use App\Models\DaftarBarang;
use App\Models\KategoriBarang;
use App\Models\Supplier;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class DaftarBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dBarang = DaftarBarang::latest()->get();
        return view('dbarang.index', compact('dBarang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori_barang = KategoriBarang::all();
        $supplier = Supplier::all();
        return view('dbarang.tambah', compact('kategori_barang', 'supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'id_kategori_barang' => 'required|exists:kategoribarang,id',
            'id_supplier' => 'required|exists:supplier,id',
            'nama' => 'required|string',
            'satuan' => 'required|string',
            'harga_beli' => 'required|numeric',
            'jumlah' => 'required|integer|min:0', // Validasi untuk stok
        ]);

        // Generate kode barang berdasarkan tanggal
        $kode_barang = $this->generateKodeBarang();

        // Simpan data barang ke database
        DaftarBarang::create([
            'id_kategori_barang' => $request->id_kategori_barang,
            'id_supplier' => $request->id_supplier,
            'nama' => $request->nama,
            'satuan' => $request->satuan,
            'harga_beli' => $request->harga_beli,
            'jumlah' => $request->jumlah, 
            'kd_barang' => $kode_barang,
        ]);

        // Redirect ke halaman daftar barang atau sesuai kebutuhan aplikasi Anda
        return redirect()->route('dbarang.index')->with('success', 'Data barang berhasil ditambahkan.');
    }

    /**
     * Function to generate kode barang.
     */
    private function generateKodeBarang()
    {
        // Ambil tanggal saat ini dalam format Ymd (misal: 20240714)
        $tanggal = Carbon::now()->format('Ymd');

        // Query untuk mencari jumlah barang berdasarkan tanggal hari ini
        $count = DaftarBarang::whereDate('created_at', Carbon::today())->count();

        // Format kode barang dengan menyertakan tanggal dan nomor urut
        $kode_barang = 'KB' . $tanggal . str_pad($count + 1, 4, '0', STR_PAD_LEFT);

        return $kode_barang;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $barang = DaftarBarang::findOrFail($id);
    $kategori_barang = KategoriBarang::all();
    $supplier = Supplier::all();
    
    return view('dbarang.edit', compact('barang', 'kategori_barang', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validasi request
    $request->validate([
        'id_kategori_barang' => 'required|exists:kategoribarang,id',
        'id_supplier' => 'required|exists:supplier,id',
        'nama' => 'required|string',
        'satuan' => 'required|string',
        'harga_beli' => 'required|numeric',
        'jumlah' => 'required|integer|min:0',
        
    ]);

    // Cari data barang berdasarkan ID
    $barang = DaftarBarang::findOrFail($id);

    // Update data barang
    $barang->update([
        'id_kategori_barang' => $request->id_kategori_barang,
        'id_supplier' => $request->id_supplier,
        'nama' => $request->nama,
        'satuan' => $request->satuan,
        'harga_beli' => $request->harga_beli,
        'jumlah' => $request->jumlah,
    ]);

    // Redirect ke halaman daftar barang atau sesuai kebutuhan aplikasi Anda
    return redirect()->route('dbarang.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari data barang berdasarkan ID
        $barang = DaftarBarang::findOrFail($id);

        // Hapus data barang
        $barang->delete();

        // Redirect ke halaman daftar barang atau sesuai kebutuhan aplikasi Anda
        return redirect()->route('dbarang.index')->with('success', 'Data barang berhasil dihapus.');

    }

    public function generatePDF()
    {
    $daftarBarang = DaftarBarang::all();

    $pdf = Pdf::loadView('dbarang.pdf', compact('daftarBarang'));

    return $pdf->download('daftar_barang.pdf');
    }
}
