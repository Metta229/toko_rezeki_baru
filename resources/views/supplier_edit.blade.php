@extends('layouts.sba')

@section('isinya')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Edit Supplier</h2>
                </div>
                <div class="card-body p-4">
                    <!-- Form untuk edit supplier -->
                    <form method="POST" action="{{ route('supplier.update', $supplier->id) }}">
                        @csrf
                        @method('PUT')
                        <!-- Method PUT untuk update data -->

                        <!-- Kode Supplier -->
                        <div class="form-group">
                            <label for="kode_supplier">Kode Supplier</label>
                            <input type="text" name="kode_supplier" id="kode_supplier"
                                class="form-control @error('kode_supplier') is-invalid @enderror"
                                value="{{ old('kode_supplier', $supplier->kode_supplier) }}" required>
                            @error('kode_supplier')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>

                        <!-- Nama Supplier -->
                        <div class="form-group">
                            <label for="nama_supplier">Nama Supplier</label>
                            <input type="text" name="nama_supplier" id="nama_supplier"
                                class="form-control @error('nama_supplier') is-invalid @enderror"
                                value="{{ old('nama_supplier', $supplier->nama_supplier) }}" required>
                            @error('nama_supplier')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>

                        <!-- Alamat -->
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat"
                                class="form-control @error('alamat') is-invalid @enderror"
                                value="{{ old('alamat', $supplier->alamat) }}" required>
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>

                        <!-- Nomor Telepon -->
                        <div class="form-group">
                            <label for="nomor_hp">Nomor Telepon</label>
                            <input type="text" name="nomor_hp" id="nomor_hp"
                                class="form-control @error('nomor_hp') is-invalid @enderror"
                                value="{{ old('nomor_hp', $supplier->nomor_hp) }}" required>
                            @error('nomor_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>

                        <!-- Tombol Submit -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection