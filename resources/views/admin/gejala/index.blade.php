@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Gejala</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('DashboardAdmin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Data Gejala</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                {{-- button modal --}}
                <div class="pt-3">

                    <section class="content">
                        <div class="container-fluid">
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
                            <!-- Modal gejala -->
                            <div class="pb-2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#gejalaModal">
                                    Tambah Data Gejala <i class="bi bi-plus-circle-fill pl-2"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="gejalaModal" tabindex="-1" aria-labelledby="gejalaModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="gejalaModalLabel">Tambah Data Gejala</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Formulir Tambah gejala -->
                                                <form action="{{ route('gejala.store') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="Kode_Gejala">Kode Gejala:</label>
                                                        <input type="text" class="form-control" id="Kode_Gejala"
                                                            name="Kode_Gejala" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Nama_Gejala">Nama Gejala:</label>
                                                        <input type="text" class="form-control" id="Nama_Gejala"
                                                            name="Nama_Gejala" required>
                                                    </div>
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
                                        <div class="table-responsive">
                                            <table id="tabelgejala" class="table table-bordered compact stripe"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th data-field="no" style="width: 5%">No.</th>
                                                        <th data-field="Kode_Gejala" style="width: 10%">Kode gejala</th>
                                                        <th data-field="Nama_Gejala">Nama gejala</th>
                                                        <th data-field="aksi" style="width: 10%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($gejala as $no => $item)
                                                        <tr>
                                                            <td>{{ $no + 1 }}</td>
                                                            <td>{{ $item->Kode_Gejala }}</td>
                                                            <td>{{ $item->Nama_Gejala }}</td>
                                                            <td>
                                                                <!-- Tombol Aksi Edit -->
                                                                <div class="row">
                                                                    <div class="pt-2 col"> <button
                                                                            href="{{ route('gejala.edit', $item->id) }}"
                                                                            type="button" class="btn btn-warning"
                                                                            data-toggle="modal"
                                                                            data-target="#editModal{{ $item->id }}"><i
                                                                                class="bi bi-pencil-square"></i></button>
                                                                    </div>

                                                                    <!-- Tombol Aksi Hapus -->
                                                                    <div class="pt-2 col">
                                                                        <button class="btn btn-danger" data-toggle="modal"
                                                                            data-target="#hapusModal{{ $item->id }}"><i
                                                                                class="bi bi-trash2-fill"></i></button>
                                                                    </div>
                                                                </div>

                                                                <!-- Modal Hapus -->
                                                                <div class="modal fade" id="hapusModal{{ $item->id }}"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="hapusModalLabel">Hapus
                                                                                    gejala</h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Apakah Anda yakin ingin menghapus gejala
                                                                                ini?
                                                                                <br>
                                                                                Nama gejala: {{ $item->Nama_Gejala }}
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Tidak</button>
                                                                                <!-- Tombol Hapus -->
                                                                                <form
                                                                                    action="{{ route('gejala.destroy', $item->id) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger">Ya</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    {{-- Modal Edit gejala --}}
                                                    @foreach ($gejala as $item)
                                                        <div class="modal fade" id="editModal{{ $item->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="editModalLabel">Edit
                                                                            gejala</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <!-- Formulir Edit gejala -->
                                                                        <form
                                                                            action="{{ route('gejala.update', $item->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('PUT')

                                                                            <div class="form-group">
                                                                                <label for="Kode_Gejala">Kode
                                                                                    gejala:</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="Kode_Gejala" name="Kode_Gejala"
                                                                                    value="{{ $item->Kode_Gejala }}"
                                                                                    required>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="Nama_Gejala">Nama
                                                                                    gejala:</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="Nama_Gejala" name="Nama_Gejala"
                                                                                    value="{{ $item->Nama_Gejala }}"
                                                                                    required>
                                                                            </div>

                                                                            <button type="submit"
                                                                                class="btn btn-primary">Simpan
                                                                                Perubahan</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                            <!-- Pagination -->

                                        </div>
                                    </div><!-- /.container-fluid -->
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
