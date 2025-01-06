@extends('layouts.sba')

@section('isinya')

<div class="mt-4 container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="border-0 shadow-lg card">
                <div class="card-header">
                    <center>
                        <h3><b>{{ $judul }}</b></h3>
                    </center>
                </div>

                <div class="card-body">

                    <!-- Open Form with Bound Model -->
                    {!! Form::model($barangkeluar, [
                    'route' => ['barangkeluar.update', $barangkeluar->id],
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

                    <!-- jumlah_keluar -->
                    <div class="form-group">
                        <label for="jumlah_keluar">Stok Masuk</label>
                        {!! Form::number('jumlah_keluar', null, ['class' => 'form-control', 'required' => true]) !!}
                        @error('jumlah_keluar')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Satuan -->
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <select name="satuan" class="form-control" required>
                            <option value="">Pilih Satuan</option>
                            @foreach($st as $satuan)
                            <option value="{{ $satuan }}" @if(old('satuan', $barangkeluar->satuan) == $satuan)
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
                    <div class="text-right form-group">
                        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection