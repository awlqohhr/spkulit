  <!-- Edit Modal -->
  @foreach ($aturans as $aturan)
      <div class="modal fade" id="editModal{{ $aturan->id }}" tabindex="-1"
          aria-labelledby="editModalLabel {{ $aturan->id }}" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editModalLabel {{ $aturan->id }}">
                          Ubah Data Aturan</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form action="#" method="POST">
                          @csrf
                          @method('PUT')

                          <div class="form-group">
                              <label for="Kode_aturan">Kode
                                  aturan</label>
                              <input type="text" class="form-control" id="Kode_aturan" name="Kode_aturan"
                                  value="{{ $aturan->Kode_aturan }}" required>
                          </div>
                          <div class="form-group">
                              <label for="Gambar_aturan">Gambar
                                  aturan</label>
                              <input type="file" class="form-control" id="Gambar_aturan" name="Gambar_aturan"
                                  onchange="previewImage(this)">
                              <div class="text-center mt-2">
                                  <img id="image-preview" class="img-fluid rounded"
                                      src="{{ asset('storage/' . $aturan->Gambar_aturan) }}" alt="Preview"
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
                              <label for="Nama_aturan">Nama
                                  aturan</label>
                              <input type="text" class="form-control" id="Nama_aturan" name="Nama_aturan"
                                  value="{{ $aturan->Nama_aturan }}" required>
                          </div>
                          <div class="form-group">
                              <label for="Deskripsi_aturan">Deskripsi
                                  aturan</label>
                              <textarea class="form-control" id="Deskripsi_aturan" name="Deskripsi_aturan" rows="4" required>{{ $aturan->Deskripsi_aturan }}</textarea>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-primary">Simpan
                                  Perubahan</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  @endforeach
