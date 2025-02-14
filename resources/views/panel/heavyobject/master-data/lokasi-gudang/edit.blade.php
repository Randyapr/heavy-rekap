@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h2>Edit Lokasi Gudang</h2>
</div>

<div class="container">
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('lokasi-gudang.update', $lokasi->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group mb-3">
                    <label>Nama Lokasi</label>
                    <input type="text" name="nama_lokasi" class="form-control" required 
                        value="{{ old('nama_lokasi', $lokasi->nama_lokasi) }}">
                    @error('nama_lokasi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Keterangan (Opsional)</label>
                    <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $lokasi->keterangan) }}</textarea>
                    @error('keterangan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('lokasi-gudang.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 