 <!-- Modal -->
 <div class="modal fade" id="aturanshowModal" tabindex="-1" aria-labelledby="aturanshowModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="aturanshowModalLabel">Data
                     Aturan</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">

                 @forelse($aturans as $aturan)
                     <strong>ID Aturan:</strong> {{ $aturan->id }}

                     @if ($aturan->penyakits)
                         <strong>Kode Penyakit:</strong> {{ $aturan->penyakits->Kode_Penyakit }}
                         <strong>Nama Penyakit:</strong> {{ $aturan->penyakits->Nama_Penyakit }}
                         <strong>Deskripsi Penyakit:</strong> {{ $aturan->penyakit->Deskripsi_Penyakit }}
                     @else
                         <strong>Kode Penyakit:</strong> Data not available
                         <strong>Nama Penyakit:</strong> Data not available
                         <strong>Deskripsi Penyakit:</strong> Data not available
                     @endif

                     @if ($aturan->gejalas)
                         <strong>Kode Gejala:</strong> {{ $aturan->gejalas->Kode_Gejala }}
                         <strong>Nama Gejala:</strong> {{ $aturan->gejalas->Nama_Gejala }}
                     @else
                         <strong>Kode Gejala:</strong> Data not available
                         <strong>Nama Gejala:</strong> Data not available
                     @endif

                     {{-- Add other fields as needed --}}
                 @empty
                     No data available.
                 @endforelse

             </div>
         </div>
     </div>
 </div>
