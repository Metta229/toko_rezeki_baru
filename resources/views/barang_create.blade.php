@extends('layouts.sba')

@section('isinya')
<div class="mt-4 container-fluid">
    <div class="row">

        <!-- Alert Section -->
        <div class="col-md-12">
            <div class="mb-3 alert alert-info w-100" role="alert">
                Untuk kode barang, silahkan lihat pada tabel data barang di samping form
            </div>
        </div>

        <!-- Form Card Section -->
        <div class="col-md-6">
            <div class="border-0 shadow-lg card">
                <div class="text-center text-white card-header bg-primary">
                    <h2>Tambah Data Barang</h2>
                </div>
                <div class="p-4 card-body">
                    <form action="{{ route('barang.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <input id="kode_barang" class="form-control" type="text" name="kode_barang"
                                value="{{ old('kode_barang') }}" required>
                            @error('kode_barang')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input id="nama_barang" class="form-control" type="text" name="nama_barang"
                                value="{{ old('nama_barang') }}" required>
                            @error('nama_barang')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <select id="satuan" class="form-control" name="satuan">
                                <option value="">Pilih Satuan</option>
                                @foreach ($list_satuan as $satuan)
                                <option value="{{ $satuan }}" @if(old('satuan')==$satuan) selected @endif>{{ $satuan }}
                                </option>
                                @endforeach
                            </select>
                            @error('satuan')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok Saat ini</label>
                            <input type="number" name="stok" class="form-control" value="{{ old('stok') }}" required
                                min="1">
                            @error('stok')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

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
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="border-0 shadow-lg card">
                <div class="text-center text-white card-header bg-primary">
                    <h2>Data Barang</h2>
                </div>
                <div class="p-2 card-body">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>br</td>
                                <td>Beras</td>
                            </tr>
                            <tr>
                                <td>my</td>
                                <td>Minyak</td>
                            </tr>
                            <tr>
                                <td>sb</td>
                                <td>Sabun</td>
                            </tr>
                            <tr>
                                <td>rk</td>
                                <td>Rokok</td>
                            </tr>
                            <tr>
                                <td>cm</td>
                                <td>Cemilan</td>
                            </tr>
                            <tr>
                                <td>pr</td>
                                <td>Penyedap Rasa</td>
                            </tr>
                            <tr>
                                <td>ks</td>
                                <td>Kecap & Saus</td>
                            </tr>
                            <tr>
                                <td>ss</td>
                                <td>Susu</td>
                            </tr>
                            <tr>
                                <td>kp</td>
                                <td>Kopi</td>
                            </tr>
                            <tr>
                                <td>th</td>
                                <td>Teh</td>
                            </tr>
                            <tr>
                                <td>sp</td>
                                <td>Shampoo</td>
                            </tr>
                            <tr>
                                <td>st</td>
                                <td>Sagu & Tepung</td>
                            </tr>
                            <tr>
                                <td>gl</td>
                                <td>Gula</td>
                            </tr>
                            <tr>
                                <td>bh</td>
                                <td>Bihun</td>
                            </tr>
                            <tr>
                                <td>mn</td>
                                <td>Minuman</td>
                            </tr>
                            <tr>
                                <td>me</td>
                                <td>Mie</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection