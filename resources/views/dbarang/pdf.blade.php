<!DOCTYPE html>
<html>
<head>
    <title>Laporan Daftar Barang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Laporan Daftar Barang</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Supplier</th>
                <th>Satuan</th>
                <th>Harga Beli</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($daftarBarang as $index => $barang)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $barang->kd_barang }}</td>
                    <td>{{ $barang->nama }}</td>
                    <td>{{ $barang->kategoribarang->nama_kategori }}</td>
                    <td>{{ $barang->supplier->nama }}</td>
                    <td>{{ $barang->satuan }}</td>
                    <td>{{ $barang->harga_beli }}</td>
                    <td>{{ $barang->jumlah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
