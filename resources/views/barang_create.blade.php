@extends('layouts.sba')

@section('isinya')
<div class="container-fluid mt-4">
    <div class="row">

        <!-- Alert Section -->
        <div class="col-md-12">
            <div class="alert alert-info w-100 mb-3" role="alert">
                Untuk kode barang, silahkan lihat pada tabel data barang di samping form
            </div>
        </div>

        <!-- Form Card Section -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Tambah Data Barang</h2>
                </div>
                <div class="card-body p-4">
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
                            <label for="harga">Harga</label>
                            <input id="harga" class="form-control" type="number" name="harga" value="{{ old('harga') }}"
                                required>
                            @error('harga')
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
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Data Barang</h2>
                </div>
                <div class="card-body p-2">
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