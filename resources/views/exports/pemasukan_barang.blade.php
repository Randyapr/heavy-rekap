<!DOCTYPE html>
<html>
<head>
    <title>Data Pemasukan Barang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
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
    <h1>Data Pemasukan Barang</h1>
    <table>
        <thead>
            <tr>
                <th>Tanggal Penerimaan</th>
                <th>Nama Supplier</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Kategori</th>
                <th>Jumlah Diterima</th>
                <th>Satuan</th>
                <th>Kondisi</th>
                <th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->tanggal_penerimaan_formatted }}</td>
                <td>{{ $item->nama_supplier }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->kode_barang }}</td>
                <td>{{ $item->kategori_barang }}</td>
                <td>{{ $item->jumlah_diterima }}</td>
                <td>{{ $item->satuan }}</td>
                <td>{{ $item->kondisi_barang }}</td>
                <td>{{ $item->lokasi_penyimpanan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 