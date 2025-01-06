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
                    {!! Form::model($barangmasuk, [
                    'route' => ['barangmasuk.update', $barangmasuk->id],
                    'method' => 'PUT',
                    'enctype' => 'multipart/form-data',
                    'id' => 'barangmasukForm'
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

                    <div class="form-group">
                        <label for="supplier_id">Pilih Supplier <strong style="color: red; font-weight: bold">*Wajib
                                Dipilih</strong></label>
                        {!! Form::select('supplier_id', $supplier_id, null, ['class' => 'form-control',
                        'placeholder' =>
                        'Pilih Supplier']) !!}
                    </div>

                    <div class="form-group">
                        <label for="barang_id">Pilih Barang <strong style="color: red; font-weight: bold">*Wajib
                                Dipilih</strong></label>
                        {!! Form::select('barang_id', $barang_id, null, ['class' => 'form-control', 'placeholder' =>
                        'Pilih Barang']) !!}
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