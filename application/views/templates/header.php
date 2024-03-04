<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($title) ? $title : 'CI3-Buku ' ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha256-PI8n5gCcz9cQqQXm3PEtDuPG8qx9oFsFctPg0S5zb8g=" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha256-3gQJhtmj7YnV1fmtbVcnAV6eI4ws0Tr48bVZCThtCGQ=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" integrity="sha256-ax2vyycgcOVnVvfDf+2BVWttFNhc1MxCXgc+WNSlgyg=" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-secondary" data-bs-theme="dark">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url() ?>">CI3-Buku</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('buku') ?>">Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('katbuku') ?>">Kategori Buku</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>