@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Penyakit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('DashboardAdmin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Data Penyakit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                {{-- button modal --}}
                <div class="pt-3">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah
                        Data<i class="bi bi-plus-square pl-3"></i></button>
                    <!-- resources/views/penyakit/create.blade.php -->
                    <!-- Modal Create -->
                    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Penyakit</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <form action="{{ route('penyakit.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <label for="kode_penyakit" class="pt-2">Kode Penyakit:</label>
                                        <input class="form-control" type="text" name="kode_penyakit" required>

                                        <label for="gambar" class="pt-2">Gambar:</label>
                                        <input class="form-control" type="file" name="gambar" accept="image/*" required>

                                        <label for="nama_penyakit" class="pt-2">Nama Penyakit:</label>
                                        <input class="form-control" type="text" name="nama_penyakit" required>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Tambah Data Penyakit</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->

        </div>
        <!-- /.content-header -->

        <!-- Main content -->



        <section class="content">
            <div class="container-fluid">
                <div>
                    @if (session('success'))
                        <div class="alert alert-success" style="color: green;">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" style="color: red;">{{ session('error') }}</div>
                    @endif
                </div>
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <table class="table align-middle mb-0 bg-white">
                                <thead class="bg-light">
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th style="width: 10px">Kode</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th style="width: 20px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penyakits as $no => $penyakit)
                                        <!-- Konten tabel -->
                                        <tr>
                                            <td>{{ $no + 1 }}</td>
                                            <td>{{ $penyakit->kode_penyakit }}</td>
                                            <td><img src="{{ asset('images/penyakit/' . $penyakit->gambar) }}"
                                                    alt="{{ $penyakit->nama_penyakit }}" width="100" height="100"></td>
                                            <td>{{ $penyakit->nama_penyakit }}</td>
                                            <td class="text-center">
                                                <div>
                                                    <form action="{{ route('penyakit.edit', $penyakit->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('UPDATE')
                                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#updatePenyakit">Edit</button>
                                                    </form>
                                                </div>
                                                <div class="pt-2">
                                                    <form action="{{ route('penyakit.delete', $penyakit->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger"
                                                            onclick="hapusPenyakit('{{ $penyakit->id }}')">Hapus</button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- Modal Update -->
                    <div class="modal fade " id="updatePenyakit" tabindex="-1" aria-labelledby="updatePenyakitLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="updatePenyakitLabel">Edit Data Penyakit</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">
                                    <form action="{{ route('penyakit.update', $penyakit->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')

                                        <label for="kode_penyakit">Kode Penyakit:</label>
                                        <input class="form-control" type="text" name="kode_penyakit"
                                            value="{{ $penyakit->kode_penyakit }}" required>
                                        <br>

                                        <label for="gambar">Gambar:</label>
                                        <input class="form-control" type="file" name="gambar">
                                        <br>

                                        @if ($penyakit->gambar)
                                            <img src="{{ asset('images/penyakit/' . $penyakit->gambar) }}"
                                                alt="Gambar Penyakit" height="150px" width="150px">
                                            <br>
                                        @endif

                                        <label for="nama_penyakit">Nama Penyakit:</label>
                                        <input class="form-control" type="text" name="nama_penyakit"
                                            value="{{ $penyakit->nama_penyakit }}" required>
                                        <br>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->


                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
