@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <!-- Your existing content header code goes here -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2"><a type="button" href="{{ route('show.diagnosa') }}"
                                    class="btn btn-outline-secondary btn-lg px-4">Kembali</a></div>
                            <div class="col-8">
                                <h2 class="text-center">Hasil Diagnosa Penyakit Kulit</h2>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                        <p class="pt-3"><strong>Nama Pasien:</strong> {{ $diagnosa->nama }}</p>
                        <p><strong>Umur:</strong> {{ $diagnosa->umur }}</p>
                        <p><strong>Jenis Kelamin:</strong> {{ $diagnosa->jenis_kelamin }}</p>
                        <p><strong>Nomor Telepon:</strong> {{ $diagnosa->no_telp ?: '-' }}</p>
                        <p><strong>Alamat Lengkap:</strong> {{ $diagnosa->alamat }}</p>

                        <h3 class="pt-3">Hasil Diagnosa:</h3>
                        @if ($diagnosa->Kode_Penyakit)
                            <p>Anda mungkin mengalami penyakit dengan kode: <strong>{{ $diagnosa->Kode_Penyakit }}</strong>
                            </p>

                            <h4>Informasi Penyakit:</h4>
                            @php
                                $penyakit = App\Models\Penyakit::where('Kode_Penyakit', $diagnosa->Kode_Penyakit)->first();
                            @endphp

                            @if ($penyakit)
                                <p><strong>Nama Penyakit:</strong> <br> {{ $aturans->first()->penyakit->Nama_Penyakit }}
                                </p>
                                <p><strong>Deskripsi dan Penanganan:</strong> <br> {!! nl2br(e($aturans->first()->penyakit->Deskripsi_Penyakit)) !!}</p>
                                <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
                            @else
                                <p>Informasi penyakit tidak tersedia.</p>
                            @endif
                        @else
                            <p>Tidak dapat menentukan penyakit berdasarkan gejala yang dipilih.</p>
                        @endif

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
