@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Aturan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('DashboardAdmin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Aturan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                {{-- button modal --}}
                <div class="pt-3">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div>
                                        @if (session('success'))
                                            <div class="alert alert-success" style="color: green;">
                                                {{ session('success') }}</div>
                                        @endif
                                        @if (session('error'))
                                            <div class="alert alert-danger" style="color: red;">{{ session('error') }}
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Modal Aturan -->
                                    <div class="pb-2">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#aturanModal">
                                            Tambah Data Aturan <i class="bi bi-plus-circle-fill pl-2"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="aturanModal" tabindex="-1"
                                            aria-labelledby="aturanModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="aturanModalLabel">Tambah Data
                                                            Aturan</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('aturan.store') }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="Kode_Gejala">Pilih Gejala:</label>
                                                                <div class="row">
                                                                    @foreach ($gejalas->sortBy('Kode_Gejala') as $gejala)
                                                                        <div class="col-md-4">
                                                                            <div class="form-check">
                                                                                <input type="checkbox" name="Kode_Gejala[]"
                                                                                    class="form-check-input"
                                                                                    value="{{ $gejala->Kode_Gejala }}">
                                                                                <label class="form-check-label">
                                                                                    {{ $gejala->Kode_Gejala }} -
                                                                                    {{ $gejala->Nama_Gejala }}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Kode_Penyakit">Pilih Penyakit:</label>
                                                                <select name="Kode_Penyakit" class="form-control" required>
                                                                    <option value="" selected disabled>-- Pilih
                                                                        Penyakit --</option>
                                                                    @foreach ($penyakits->sortBy('Kode_Penyakit') as $penyakit)
                                                                        <option value="{{ $penyakit->Kode_Penyakit }}">
                                                                            {{ $penyakit->Kode_Penyakit }} -
                                                                            {{ $penyakit->Nama_Penyakit }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <!-- Tambahkan field sesuai kebutuhan -->
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <!-- Tabel gejala -->
                                                <div class="table-responsive text-center">
                                                    <table id="tabelaturan" class="table table-bordered compact stripe"
                                                        style="width: 90%;">
                                                        <thead>
                                                            <tr>
                                                                <th style="width:5%">No</th>
                                                                <th>Gejala</th>
                                                                <th>Penyakit</th>
                                                                <th style="width:15%">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $groupedData = $data->groupBy('Kode_Penyakit');
                                                            @endphp

                                                            @forelse($groupedData as $kodePenyakit => $aturans)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $aturans->pluck('Kode_Gejala')->implode(', ') }}
                                                                    </td>
                                                                    <td>{{ $kodePenyakit }}</td>
                                                                    <td>
                                                                        <!-- Button trigger modal -->
                                                                        <button type="button" class="btn btn-info"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#aturanshowModal">
                                                                            <i class="bi bi-eye-fill"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-warning"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#aturaneditModal">
                                                                            <i class="bi bi-pencil-fill"></i>
                                                                        </button>
                                                                        <form
                                                                            action="{{ route('aturan.destroy', $kodePenyakit) }}"
                                                                            method="POST" style="display: inline;">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-danger"
                                                                                onclick="return confirm('Yakin ingin menghapus? {{ $kodePenyakit }}')">Hapus</button>
                                                                        </form>

                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="3">Belum ada aturan.</td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                    <!-- Pagination -->

                                                    @include('admin.aturan.show')

                                                    @include('admin.aturan.edit')

                                                </div>
                                            </div><!-- /.container-fluid -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
            </div>
        </div>
    </div>
@endsection
