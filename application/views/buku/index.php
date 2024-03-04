<div class="container">
  <div class="d-flex flex-wrap justify-content-between align-items-center">
    <h2 class="fw-bold my-3">List Buku</h2>
    <a class="btn btn-sm btn-primary rounded-0" href="<?= base_url('buku/create') ?>">
      Tambah Buku <i class="ri-add-line"></i></a>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-bordered">
      <thead class="table-light">
        <tr>
          <th>No</th>
          <th>Judul Buku</th>
          <th>Kategori</th>
          <th>Penulis</th>
          <th>Tahun Terbit</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($buku as $key => $data) : ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td>
              <div class="d-flex gap-2">
                <img src="<?= base_url('assets/img/buku/' . $data->cover) ?>" height="100px">
                <?= $data->judul ?>
              </div>
            </td>
            <td><?= $data->nama_kategori ?></td>
            <td><?= $data->penulis ?></td>
            <td><?= $data->tahun_terbit ?></td>
            <td>
              <a href="<?= base_url('buku/edit/' . $data->id_buku) ?>" class="btn btn-sm btn-warning rounded-0">
                <i class="ri-edit-box-line"></i>
              </a>
              <a href="<?= base_url('buku/delete/' . $data->id_buku) ?>" class="btn btn-sm btn-danger rounded-0">
                <i class="ri-delete-bin-line"></i>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>