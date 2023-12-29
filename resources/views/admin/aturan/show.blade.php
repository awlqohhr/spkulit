<!-- Modal -->
<div class="modal fade" id="aturanshowModal" tabindex="-1" aria-labelledby="aturanshowModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="aturanshowModalLabel">Data Aturan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @php
                    $groupedData = $data->groupBy('Kode_Penyakit');
                @endphp

                @forelse($groupedData as $kodePenyakit => $aturans)
                    <div>
                        <strong>ID Aturan:</strong> {{ $aturans->pluck('id')->implode(', ') }} <br>
                        <strong>Kode Gejala:</strong> {{ $aturans->pluck('gejala.Kode_Gejala')->implode(', ') }} <br>
                        <strong>Nama Gejala:</strong> {{ $aturans->pluck('gejala.Nama_Gejala')->implode(', ') }} <br>
                        <strong>Kode Penyakit:</strong> {{ $kodePenyakit }} <br>
                        <strong>Nama Penyakit:</strong> {{ $aturans->first()->penyakit->Nama_Penyakit }} <br>
                        <strong>Deskripsi Penyakit:</strong> {{ $aturans->first()->penyakit->Deskripsi_Penyakit }}
                    </div>

                    {{-- Add other fields as needed --}}
                @empty
                    No data available.
                @endforelse
            </div>
        </div>
    </div>
</div>
