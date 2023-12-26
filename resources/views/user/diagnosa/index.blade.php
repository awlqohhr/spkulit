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
                            <div class="col-sm-6">
                                <label for="alamat">Alamat Pasien:</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>
                            <label>
                                <span>Pilihan Gejala:</span>
                            </label>
                            <div class="col-sm-6">
                                <div class="px-5">
                                    @foreach ($gejalas as $gejala)
                                        <input class="form-check-input" type="checkbox" value="{{ $gejala->Nama_Gejala }}"
                                            id="gejala" name="gejala[]">
                                        <option value="{{ $gejala->id }}"><label for="gejala">
                                                <p>{{ $gejala->Kode_Gejala }}</p>
                                                - {{ $gejala->Nama_Gejala }}
                                            </label>
                                        </option>
                                    @endforeach
                                </div>
                            </div>

                            <div class="">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
