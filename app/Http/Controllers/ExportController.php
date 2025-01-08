<?php

namespace App\Http\Controllers;

use App\Models\PemasukanBarang;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PemasukanBarangExport;
use PDF;

class ExportController extends Controller
{
    public function export(Request $request, $type)
    {
        $data = PemasukanBarang::all();

        switch ($type) {
            case 'csv':
                return Excel::download(new PemasukanBarangExport($data), 'pemasukan_barang.csv');
            case 'excel':
                return Excel::download(new PemasukanBarangExport($data), 'pemasukan_barang.xlsx');
            case 'pdf':
                $pdf = PDF::loadView('exports.pemasukan_barang', ['data' => $data]);
                return $pdf->download('pemasukan_barang.pdf');
            default:
                return redirect()->back()->with('error', 'Format tidak valid');
        }
    }
}