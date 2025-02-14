<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pemasukan Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
        }
        th {
            background-color: #f0f0f0;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laporan Pemasukan Barang</h1>
        <p>Tanggal: {{ now()->format('d/m/Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Supplier</th>
                <th>No PO</th>
                <th>Nama Barang</th>
                <th>Kode</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Sisa</th>
                <th>Satuan</th>
                <th>Kondisi</th>
                <th>Lokasi</th>
                <th>Petugas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $pemasukan)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $pemasukan->tanggal_penerimaan->format('d/m/Y') }}</td>
                <td>{{ $pemasukan->nama_supplier }}</td>
                <td>{{ $pemasukan->nomor_po }}</td>
                <td>{{ $pemasukan->nama_barang }}</td>
                <td>{{ $pemasukan->kode_barang }}</td>
                <td>{{ $pemasukan->kategori_barang }}</td>
                <td>{{ $pemasukan->jumlah_diterima }}</td>
                <td>{{ $pemasukan->sisa_stok }}</td>
                <td>{{ $pemasukan->satuan }}</td>
                <td>{{ $pemasukan->kondisi_barang }}</td>
                <td>{{ $pemasukan->lokasi_penyimpanan }}</td>
                <td>{{ $pemasukan->nama_petugas }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 