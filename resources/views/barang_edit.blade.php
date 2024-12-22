@extends('layouts.sba')

@section('isinya')

<head>
    <style>
        .font-weight-bold {
            font-weight: bold;
            color: black;
            /* Set the text color to black */
        }
    </style>
</head>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Edit Barang</h2>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('barang.update', $barang->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="text" name="kode_barang" id="kode_barang" class="form-control"
                                value="{{ $barang->kode_barang }}" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                                value="{{ $barang->nama_barang }}" required>
                        </div>
                        <div class="form-group">
                            <label for="satuan" class="font-weight-bold">Satuan</label> <!-- Apply the class here -->
                            <select name="satuan" id="satuan" class="form-control" required>
                                <option value="">Pilih Satuan</option>
                                @foreach ($list_satuan as $satuan)
                                <option value="{{ $satuan }}" @if($barang->satuan == $satuan) selected @endif>{{ $satuan
                                    }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga</label> <!-- Kolom Harga baru -->
                            <input id="harga" class="form-control" type="number" name="harga" value="{{ old('harga') }}"
                                required>
                            @error('harga')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

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