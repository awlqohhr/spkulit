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
                                    <div class="container">
                                        <h2>Tambah Penyakit</h2>

                                        <!-- Your create form goes here -->
                                        <form action="{{ route('penyakit.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <!-- Form fields go here -->

                                            <div class="form-group">
                                                <label for="kode_penyakit">Kode Penyakit:</label>
                                                <input type="text" name="kode_penyakit" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="gambar">Gambar:</label>
                                                <input type="file" name="gambar" class="form-control-file">
                                            </div>

                                            <div class="form-group">
                                                <label for="nama_penyakit">Nama Penyakit:</label>
                                                <input type="text" name="nama_penyakit" class="form-control" required>
                                            </div>



                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>

                                        <!-- Bootstrap Modal for Create -->
                                        <div class="modal fade" id="createModal" tabindex="-1" role="dialog"
                                            aria-labelledby="createModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="createModalLabel">Sukses</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Data penyakit berhasil ditambahkan!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Script to show the Bootstrap modal on successful form submission -->
                                    @if (session('success'))
                                        <script>
                                            $(document).ready(function() {
                                                $('#createModal').modal('show');
                                            });
                                        </script>
                                    @endif
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
                            <div class="table-responsive">
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
                                        @foreach ($penyakits as $penyakit)
                                            <tr>
                                                <td>{{ $no + 1 }} </td>
                                                <td>{{ $penyakit->kode_penyakit }}</td>
                                                <td>{{ $penyakit->nama_penyakit }}</td>
                                                <td>
                                                    <img src="{{ asset('images/penyakit/' . $penyakit->gambar) }}"
                                                        alt="{{ $penyakit->nama_penyakit }}" height="50">
                                                </td>
                                                <td>
                                                    <a href="{{ route('penyakit.edit', $penyakit->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <button class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteModal{{ $penyakit->id }}">Hapus</button>
                                                </td>
                                            </tr>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModal{{ $penyakit->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="deleteModalLabel{{ $penyakit->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel{{ $penyakit->id }}">Konfirmasi Hapus
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus data penyakit ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Tutup</button>
                                                            <form action="{{ route('penyakit.destroy', $penyakit->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Modal Update -->
                        <div class="modal fade " id="updatePenyakit" tabindex="-1"
                            aria-labelledby="updatePenyakitLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="updatePenyakitLabel">Edit Data Penyakit</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ">

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
