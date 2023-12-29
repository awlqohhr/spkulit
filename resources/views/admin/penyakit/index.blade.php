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
                            <!-- Modal Create -->
                            <div class="pb-2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#createModal">
                                    Tambah Data <i class="bi bi-plus-circle-fill pl-2"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="createModalLabel">Tambah Data Penyakit</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('penyakit.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="form-group">
                                                        <label for="Kode_Penyakit">Kode Penyakit</label>
                                                        <input type="text" class="form-control" id="Kode_Penyakit"
                                                            name="Kode_Penyakit" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Gambar_Penyakit">Gambar Penyakit</label>
                                                        <input type="file" class="form-control" id="Gambar_Penyakit"
                                                            name="Gambar_Penyakit" onchange="previewImage(this)">
                                                        <div class="text-center mt-2">
                                                            <img id="image-preview" class="img-fluid rounded" src="#"
                                                                alt="Preview" style="display:none; max-width: 300px">
                                                        </div>
                                                    </div>
                                                    <script>
                                                        function previewImage(input) {
                                                            var preview = document.getElementById('image-preview');
                                                            var file = input.files[0];
                                                            var reader = new FileReader();

                                                            reader.onloadend = function() {
                                                                preview.src = reader.result;
                                                                preview.style.display = 'block';
                                                            };

                                                            if (file) {
                                                                reader.readAsDataURL(file);
                                                            } else {
                                                                preview.src = '';
                                                                preview.style.display = 'none';
                                                            }
                                                        }
                                                    </script>

                                                    <div class="form-group">
                                                        <label for="Nama_Penyakit">Nama Penyakit</label>
                                                        <input type="text" class="form-control" id="Nama_Penyakit"
                                                            name="Nama_Penyakit" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Deskripsi_Penyakit">Deskripsi
                                                            Penyakit</label>
                                                        <textarea class="form-control" id="Deskripsi_Penyakit" name="Deskripsi_Penyakit" rows="4" required></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="data_penyakit">
                                        <div class="table-responsive">
                                            <table id="tabelpenyakit" class="table table-bordered compact stripe"
                                                style="auto">
                                                <thead>
                                                    <tr>
                                                        <th data-field="kode_penyakit" style="width: 10%">Kode Penyakit</th>
                                                        <th data-field="gambar">Gambar Penyakit</th>
                                                        <th data-field="nama_penyakit">Nama Penyakit</th>
                                                        <th data-field="deskirpsi_penyakit">Deskripsi Penyakit</th>
                                                        <th data-field="aksi" style="width: 10%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($penyakits as $no => $penyakit)
                                                        <tr>
                                                            <td>{{ $penyakit->Kode_Penyakit }}</td>
                                                            <td>
                                                                @if ($penyakit->Gambar_Penyakit)
                                                                    <img src="{{ asset('storage/' . $penyakit->Gambar_Penyakit) }}"
                                                                        alt="Gambar Penyakit" style="max-width: 100px;">
                                                                @else
                                                                    No Image
                                                                @endif
                                                            <td>{{ $penyakit->Nama_Penyakit }}</td>
                                                            <td> @php
                                                                // Split the deskripsi into paragraphs
                                                                $paragraphs = explode("\n", $penyakit->Deskripsi_Penyakit);
                                                            @endphp

                                                                @foreach ($paragraphs as $paragraph)
                                                                    <p>{{ $paragraph }}</p>
                                                                @endforeach
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="row">
                                                                    <div class="pt-2 col"> <button type="button"
                                                                            class="btn btn-warning" data-bs-toggle="modal"
                                                                            data-bs-target="#editModal{{ $penyakit->id }}">
                                                                            <i class="bi bi-pencil-square"></i>
                                                                        </button></div>
                                                                    <div class="pt-2 col"> <button type="button"
                                                                            class="btn btn-danger" data-bs-toggle="modal"
                                                                            data-bs-target="#deleteModal{{ $penyakit->id }}">
                                                                            <i class="bi bi-trash2-fill"></i>
                                                                        </button></div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <!-- Edit Modal -->
                                                        @foreach ($penyakits as $penyakit)
                                                            <div class="modal fade" id="editModal{{ $penyakit->id }}"
                                                                tabindex="-1"
                                                                aria-labelledby="editModalLabel {{ $penyakit->id }}"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5"
                                                                                id="editModalLabel {{ $penyakit->id }}">
                                                                                Ubah Data Penyakit</h1>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form
                                                                                action="{{ route('penyakit.update', ['id' => $penyakit->id]) }}"
                                                                                enctype="multipart/form-data"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PUT')

                                                                                <div class="form-group">
                                                                                    <label for="Kode_Penyakit">Kode
                                                                                        Penyakit</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="Kode_Penyakit"
                                                                                        name="Kode_Penyakit"
                                                                                        value="{{ $penyakit->Kode_Penyakit }}"
                                                                                        required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="Gambar_Penyakit">Gambar
                                                                                        Penyakit</label>
                                                                                    <input type="file"
                                                                                        class="form-control"
                                                                                        id="Gambar_Penyakit"
                                                                                        name="Gambar_Penyakit"
                                                                                        onchange="previewImage(this)">
                                                                                    <div class="text-center mt-2">
                                                                                        <img id="image-preview"
                                                                                            class="img-fluid rounded"
                                                                                            src="{{ asset('storage/' . $penyakit->Gambar_Penyakit) }}"
                                                                                            alt="Preview"
                                                                                            style="max-width: 300px;">
                                                                                    </div>
                                                                                </div>
                                                                                <script>
                                                                                    function previewImage(input) {
                                                                                        var preview = document.getElementById('image-preview');
                                                                                        var file = input.files[0];
                                                                                        var reader = new FileReader();

                                                                                        reader.onload = function(e) {
                                                                                            preview.src = e.target.result;
                                                                                        };

                                                                                        if (file) {
                                                                                            reader.readAsDataURL(file);
                                                                                        }
                                                                                    }
                                                                                </script>
                                                                                <div class="form-group">
                                                                                    <label for="Nama_Penyakit">Nama
                                                                                        Penyakit</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="Nama_Penyakit"
                                                                                        name="Nama_Penyakit"
                                                                                        value="{{ $penyakit->Nama_Penyakit }}"
                                                                                        required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="Deskripsi_Penyakit">Deskripsi
                                                                                        Penyakit</label>
                                                                                    <textarea class="form-control" id="Deskripsi_Penyakit" name="Deskripsi_Penyakit" oninput="autoparagraph(this)"
                                                                                        rows="4" required>{{ $penyakit->Deskripsi_Penyakit }}</textarea>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Batal</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Simpan
                                                                                        Perubahan</button>
                                                                                </div>
                                                                            </form>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                        <!-- Delete Modal -->
                                                        @foreach ($penyakits as $penyakit)
                                                            <div class="modal fade" id="deleteModal{{ $penyakit->id }}"
                                                                tabindex="-1"
                                                                aria-labelledby="deleteModalLabel{{ $penyakit->id }}"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5"
                                                                                id="deleteModalLabel">Hapus Data
                                                                            </h1>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Apakah anda ingin menghapus data
                                                                            ini?<br>{{ $penyakit->Nama_Penyakit }}
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Tidak</button>
                                                                            <form
                                                                                action="{{ route('penyakit.destroy', ['id' => $penyakit->id]) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Ya</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
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
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function autoparagraph(textarea) {
            // Split the text by line breaks
            const lines = textarea.value.split('\n');

            // Create paragraphs by wrapping lines with <p> tags
            const paragraphs = lines.map(line => `<p>${line}</p>`);

            // Join paragraphs and set it as the HTML content of the textarea
            textarea.innerHTML = paragraphs.join('');
        }
    </script>
@endsection
