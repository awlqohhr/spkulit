<!-- Modal -->
<div class="modal fade" id="aturanshowModal" tabindex="-1" aria-labelledby="aturanshowModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="aturanshowModalLabel">Data Aturan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (isset($aturans))
                    <div>
                        <strong>ID Aturan:</strong> {{ $aturans->pluck('id')->implode(', ') }} <br>
                        <strong>Kode Gejala:</strong> {{ $aturans->pluck('gejala.Kode_Gejala')->implode(', ') }} <br>
                        <strong>Nama Gejala:</strong> {{ $aturans->pluck('gejala.Nama_Gejala')->implode(', ') }} <br>
                        <strong>Kode Penyakit:</strong> {{ $kodePenyakit }} <br>
                        <strong>Nama Penyakit:</strong> {{ $aturans->first()->penyakit->Nama_Penyakit }} <br>
                        <strong>Deskripsi Penyakit:</strong> {{ $aturans->first()->penyakit->Deskripsi_Penyakit }}
                    </div>

                    {{-- Add other fields as needed --}}
                @else
                    No data available.
                @endif

                {{-- @if (isset($aturan))
                    <p><strong>Kode Gejala:</strong> {{ $aturan->Kode_Gejala }}</p>
                    <p><strong>Kode Penyakit:</strong> {{ $aturan->Kode_Penyakit }}</p>
                    <!-- Tambahkan informasi atribut lain sesuai kebutuhan -->

                    <a href="{{ url('/aturan') }}">Kembali</a>
                @else
                    <p>Aturan tidak ditemukan.</p>
                @endif --}}
            </div>
        </div>
    </div>
</div>
