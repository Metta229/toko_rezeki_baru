@extends('layouts.sba')

@section('isinya')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Tambah Data Barang</h2>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('barangmasuk.store') }}">
                        @csrf
                        <!-- Tanggal -->
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}">
                            @error('tanggal')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="supplier_id">Pilih Supplier <strong style="color: red; font-weight: bold">*Wajib
                                    Dipilih</strong></label>
                            {!! Form::select('supplier_id', $supplier_id, null, ['class' => 'form-control', 'placeholder' =>
                            'Pilih Supplier']) !!}
                        </div>

                        <div class="form-group">
                            <label for="barang_id">Pilih Barang <strong style="color: red; font-weight: bold">*Wajib
                                    Dipilih</strong></label>
                            {!! Form::select('barang_id', $barang_id, null, ['class' => 'form-control', 'placeholder' =>
                            'Pilih Barang']) !!}
                        </div>

                        <!-- Stok Masuk -->
                        <div class="form-group">
                            <label for="stok_masuk">Stok Masuk</label>
                            <input type="number" name="stok_masuk" class="form-control" value="{{ old('stok_masuk') }}"
                                required min="1">
                            @error('stok_masuk')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Harga -->
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" class="form-control" value="{{ old('harga') }}" required
                                min="0">
                            @error('harga')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Satuan -->
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <select name="satuan" class="form-control" required>
                                <option value="">Pilih Satuan</option>
                                @foreach($list_satuan as $satuan)
                                <option value="{{ $satuan }}" @selected(old('satuan')==$satuan)>
                                    {{ $satuan }}
                                </option>
                                @endforeach
                            </select>
                            @error('satuan')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection