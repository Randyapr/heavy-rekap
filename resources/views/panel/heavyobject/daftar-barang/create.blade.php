<div class="form-group">
    <label>Kategori Barang</label>
    <input type="text" name="kategori_barang" class="form-control @error('kategori_barang') is-invalid @enderror" required>
    @error('kategori_barang')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div> 