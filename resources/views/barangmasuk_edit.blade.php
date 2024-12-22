@extends('layouts.sba')

@section('isinya')

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header">
                    <center>
                        <h3><b>{{ $judul }}</b></h3>
                    </center>
                </div>

                <div class="card-body">

                    <!-- Open Form with Bound Model -->
                    {!! Form::model($barangmasuk, [
                    'route' => ['barangmasuk.update', $barangmasuk->id],
                    'method' => 'PUT',
                    'enctype' => 'multipart/form-data',
                    'id' => 'barangForm'
                    ]) !!}
                    @csrf

                    <!-- Tanggal -->
                    <div class="form-group">
                        <label for="tanggal">Tanggal <strong style="color: red; font-weight: bold"> *Wajib
                                Diisi</strong></label>
                        {!! Form::date('tanggal', null, ['class' => 'form-control', 'required' => true]) !!}
                        @error('tanggal')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!--Nama Supplier-->
                    <div class="form-group">
                        <label for="nama_supplier">Nama Supplier</label>
                        {!! Form::text('nama_supplier', null, ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <!-- Nama Barang -->
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        {!! Form::text('nama_barang', null, ['class' => 'form-control', 'required' => true]) !!}
                    </div>

                    <!-- Harga -->
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        {!! Form::number('harga', null, ['class' => 'form-control', 'step' => '0.01', 'required' =>
                        true]) !!}
                        @error('harga')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Stok_masuk -->
                    <div class="form-group">
                        <label for="stok_masuk">Stok Masuk</label>
                        {!! Form::number('stok_masuk', null, ['class' => 'form-control', 'required' => true]) !!}
                        @error('stok_masuk')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Satuan -->
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <select name="satuan" class="form-control" required>
                            <option value="">Pilih Satuan</option>
                            @foreach($st as $satuan)
                            <option value="{{ $satuan }}" @if(old('satuan', $barangmasuk->satuan) == $satuan)
                                selected
                                @endif>
                                {{ $satuan }}
                            </option>
                            @endforeach
                        </select>
                        @error('satuan')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group text-right">
                        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection