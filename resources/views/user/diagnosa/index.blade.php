@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Diagnosa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Diagnosa</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h2 class="pb-3 text-center">Formulir Diagnosa Penyakit Kulit</h2>
                        <form action="{{ route('hasil.diagnosa') }}" method="post"
                            class="row gy-2 gx-3 align-items-center">

                            @csrf
                            <div class="col-sm-6">
                                <label for="nama">Nama Pasien:</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="col-sm-2">
                                <label for="umur">Umur:</label>
                                <input type="number" class="form-control" id="umur" name="umur" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="no_telp">Nomor Telepon:</label>
                                <input type="tel" class="form-control" id="no_telp" name="no_telp" required>
                            </div>
                            <div class="col-sm-12">
                                <label for="alamat">Alamat Pasien:</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>
                            <label>
                                <span>Pilihan Gejala:</span>
                            </label>
                            <div>
                                <div class="row">
                                    @foreach ($gejalas as $gejala)
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="checkbox" name="Kode_Gejala[]" class="form-check-input"
                                                    value="{{ $gejala->Kode_Gejala }}">
                                                <label class="form-check-label">{{ $gejala->Kode_Gejala }} <span>-</span>
                                                    {{ $gejala->Nama_Gejala }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="">
                                <button type="submit" class="btn btn-primary">Diagnosa</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
