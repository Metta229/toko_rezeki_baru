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

<div class="mt-4 container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="border-0 shadow-lg card">
                <div class="text-center text-white card-header bg-primary">
                    <h2>Edit Barang</h2>
                </div>
                <div class="p-4 card-body">
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
                            <label for="satuan">Satuan</label> <!-- Apply the class here -->
                            <select name="satuan" id="satuan" class="form-control" required>
                                <option value="">Pilih Satuan</option>
                                @foreach ($list_satuan as $satuan)
                                <option value="{{ $satuan }}" @if($barang->satuan == $satuan) selected @endif>{{ $satuan
                                    }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="stok">Stok Saat ini</label>
                            <input type="number" name="stok" class="form-control" value="{{ old('stok') }}" required
                                min="1">
                            @error('stok')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Harga -->
                        <div class="form-group">
                            <label for="harga_beli">Harga Beli</label>
                            {!! Form::number('harga_beli', null, ['class' => 'form-control', 'step' => '0.01',
                            'required' =>
                            true]) !!}
                            @error('harga_beli')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Harga -->
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            {!! Form::number('harga_jual', null, ['class' => 'form-control', 'step' => '0.01',
                            'required' =>
                            true]) !!}
                            @error('harga_jual')
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