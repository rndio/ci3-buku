<div class="container">
  <div class="d-flex flex-wrap justify-content-between align-items-center">
    <h2 class="fw-bold my-3">List Kategori</h2>
    <button id="createBtn" type="button" class="btn btn-sm btn-primary rounded-0">
      Tambah Kategori <i class=" ri-add-line"></i></button>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-bordered">
      <thead class="table-light">
        <tr>
          <th>No</th>
          <th>Kategori Buku</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($categories as $key => $category) : ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $category->nama_kategori ?></td>
            <td>
              <button data-id="<?= $category->id_kategori ?>" data-name="<?= $category->nama_kategori ?>" class="btn btn-sm btn-warning rounded-0 editBtns">
                <i class="ri-edit-box-line"></i>
              </button>
              <a href="<?= base_url('katbuku/delete/' . $category->id_kategori) ?>" class="btn btn-sm btn-danger rounded-0 deleteBtns">
                <i class="ri-delete-bin-line"></i>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
  <form class="modal-dialog modal-dialog-centered" id="modalForm" action="" method="POST">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h6 class="modal-title fw-bold">Modal title</h6>
        <button type="button" class="btn-close small" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <label for="nama_kategori" class="form-label required">Nama Kategori</label>
          <input type="text" class="form-control rounded-0" name="nama_kategori" id="nama_kategori" />
        </div>
      </div>
      <div class="modal-footer">
        <button id="form-submit" type="submit" class="btn btn-success btn-sm rounded-0">Tambah Kategori</button>
      </div>
    </div>
  </form>
</div>

<script>
  const modalEl = document.getElementById('modal');
  const modal = new bootstrap.Modal(modalEl);
  const form = document.getElementById('modalForm');

  const createBtn = document.getElementById('createBtn');
  const editBtns = document.querySelectorAll('.editBtns');
  const deleteBtns = document.querySelectorAll('.deleteBtns');

  createBtn.addEventListener('click', () => {
    form.reset();
    modal.show();
    form.action = '<?= base_url('katbuku/store') ?>';
    modalEl.querySelector('.modal-title').textContent = 'Tambah Kategori';
    modalEl.querySelector('#form-submit').textContent = 'Tambah Kategori';
    modalEl.querySelector('#form-submit').classList.add('btn-success');
    modalEl.querySelector('#form-submit').classList.remove('btn-warning');
  });

  editBtns.forEach(editBtn => {
    editBtn.addEventListener('click', () => {
      form.reset();
      modal.show();
      form.action = '<?= base_url('katbuku/edit/') ?>' + editBtn.dataset.id;
      modalEl.querySelector('.modal-title').textContent = 'Edit Kategori: ' + editBtn.dataset.name;
      document.getElementById('nama_kategori').value = editBtn.dataset.name;
      modalEl.querySelector('#form-submit').textContent = 'Edit Kategori';
      modalEl.querySelector('#form-submit').classList.add('btn-warning');
      modalEl.querySelector('#form-submit').classList.remove('btn-success');
    })
  })

  deleteBtns.forEach(deleteBtn => {
    deleteBtn.addEventListener('click', (e) => {
      e.preventDefault();
      const confirmDelete = confirm('Apakah anda yakin ingin menghapus data ini?');
      if (confirmDelete) {
        window.location.href = deleteBtn.getAttribute('href');
      }
    })
  })
</script>