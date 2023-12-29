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
                     <div>
                         <strong>ID Aturan:</strong> {{ $aturan->id }}
                     </div>

                     @if ($aturan->gejala)
                         <div>
                             <strong>Kode Gejala:</strong> {{ $aturan->gejala->Kode_Gejala }}
                             <strong>Nama Gejala:</strong> {{ $aturan->gejala->Nama_Gejala }}
                         </div>
                     @else
                         <div>
                             <strong>Kode Gejala:</strong> Data not available
                             <strong>Nama Gejala:</strong> Data not available
                         </div>
                     @endif

                     @if ($aturan->penyakit)
                         <div>
                             <strong>Kode Penyakit:</strong> {{ $aturan->penyakit->Kode_Penyakit }}
                             <strong>Nama Penyakit:</strong> {{ $aturan->penyakit->Nama_Penyakit }}
                             <strong>Deskripsi Penyakit:</strong> {{ $aturan->penyakit->Deskripsi_Penyakit }}
                         </div>
                     @else
                         <div>
                             <strong>Kode Penyakit:</strong> Data not available
                             <strong>Nama Penyakit:</strong> Data not available
                             <strong>Deskripsi Penyakit:</strong> Data not available
                         </div>
                     @endif

                     {{-- Add other fields as needed --}}
                 @empty
                     No data available.
                 @endforelse


             </div>
         </div>
     </div>
 </div>
