<!DOCTYPE html>
<html>
<head>
    <title>Data Karyawan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <h2>Data Karyawan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Gaji</th>
                <th>Foto</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($karyawan as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row->nama_karyawan }}</td>
                    <td>{{ $row->no_telepon }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->gaji }}</td>
                    <td>
                        @if ($row->foto)
                            <img src="{{ public_path('storage/foto/' . $row->foto) }}" alt="Foto Karyawan">
                        @else
                            <p>Tidak ada foto</p>
                        @endif
                    </td>
                    <td>{{ $row->umur }}</td>
                    <td>{{ $row->jenis_kelamin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
