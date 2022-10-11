<div class="container" mt-5>
  <div class="row">
    <div class="col-6">
      <h3 class="mt-3">Daftar Mahasiswa</h3>
      <ul class="list-group mt-5">
        <?php foreach ($data['mhs'] as $mhs) : ?>

          <li class="list-group-item d-flex justify-content-between align-items-conter">
            <?= $mhs['nama']; ?>
            <a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mhs['id'] ?>" class="badge badge-primary">detail</a>

          </li>

        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>