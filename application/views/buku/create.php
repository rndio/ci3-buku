<div class="container">
  <div class="d-flex flex-wrap justify-content-between align-items-center">
    <h2 class="fw-bold my-3">Tambah Buku</h2>
  </div>
  <form action="<?= base_url('buku/store') ?>" method="post" enctype="multipart/form-data">
    <div class="card card-body">
      <div class="row">
        <div class="col-12 col-md-7">
          <div class="mb-3">
            <label for="judul" class="form-label required">Judul Buku</label>
            <input type="text" class="form-control rounded-0 <?= isset($validation_errors['judul']) ? 'is-invalid' : '' ?>" name="judul" id="judul">
            <?= form_error('judul') ?>
          </div>
          <div class="mb-3">
            <label for="id_kategori" class="form-label required">Kategori</label>
            <select class="form-select rounded-0 " name="id_kategori">
              <?php foreach ($kategori as $data) : ?>
                <option value="<?= $data->id_kategori ?>"><?= $data->nama_kategori ?></option>
              <?php endforeach; ?>
            </select>
            <?= form_error('id_kategori') ?>
          </div>
          <div class="mb-3">
            <label for="penulis" class="form-label required">Penulis</label>
            <input type="text" class="form-control rounded-0 <?= isset($validation_errors['penulis']) ? 'is-invalid' : '' ?>" name="penulis" id="penulis">
            <?= form_error('penulis') ?>
          </div>
          <div class="mb-3">
            <label for="penulis" class="form-label required">Tahun Terbit</label>
            <input type="number" class="form-control rounded-0 <?= isset($validation_errors['tahun_terbit']) ? 'is-invalid' : '' ?>" name="tahun_terbit" id="tahun_terbit" min="1000" max="<?= date('Y') ?>">
            <?= form_error('tahun_terbit') ?>
          </div>
        </div>
        <div class="col-12 col-md-5">
          <div class="mb-3">
            <label for="cover" class="form-label">Foto</label>
            <input type="file" id="cover" name="cover" class="form-control rounded-0 <?= isset($validation_errors['cover']) ? 'is-invalid' : '' ?>">
            <?= form_error('cover') ?>
          </div>
          <div class="mb-3">
            <label for="photo" class="form-label">Preview Image</label>
            <div class="text-center">
              <img id="preview_image" class="img-fluid" src="<?= base_url('assets/img/buku/default.webp') ?>" style="max-height: 210px;">
            </div>
          </div>
        </div>
        <div class="col-12 col-md-7 text-end">
          <button type="submit" class="btn btn-success rounded-0">Simpan Buku</button>
        </div>
      </div>
    </div>
  </form>
</div>

<script>
  const photo = document.getElementById('cover');
  const preview_image = document.getElementById('preview_image');

  photo.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function() {
        preview_image.src = reader.result;
      }
      reader.readAsDataURL(file);
    }
  });
</script>