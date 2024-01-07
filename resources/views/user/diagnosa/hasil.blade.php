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
                        <h2 class="pb-3 text-center">Hasil Diagnosa Penyakit Kulit</h2>

                        <p><strong>Nama Pasien:</strong> {{ $diagnosa->nama }}</p>
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
                                <p><strong>Nama Penyakit:</strong> {{ $penyakit->Nama_Penyakit }}</p>
                                <p><strong>Deskripsi:</strong> {{ $penyakit->deskripsi }}</p>
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
