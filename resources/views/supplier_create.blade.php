@extends('layouts.sba')

@section('isinya')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Tambah Supplier</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('supplier.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kode_supplier">Kode Supplier</label>
                            <input id="kode_supplier" class="form-control" type="text" name="kode_supplier"
                                value="{{ old('kode_supplier') }}" required>
                            @error('kode_supplier')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nama_supplier">Nama Supplier</label>
                            <input id="nama_supplier" class="form-control" type="text" name="nama_supplier"
                                value="{{ old('nama_supplier') }}" required>
                            @error('nama_supplier')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input id="alamat" class="form-control" type="text" name="alamat"
                                value="{{ old('alamat') }}" required>
                            @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nomor_hp">Nomor HP</label>
                            <input id="nomor_hp" class="form-control" type="text" name="nomor_hp"
                                value="{{ old('nomor_hp') }}" required>
                            @error('nomor_hp')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <br>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection