<?php
require('./lib/function.php');

$nimGet = $_GET["nim"];

$mhs = get_single_mahasiswa($nimGet);

if (is_null($mhs)) {
  header('location: components/404.php');
}

if (isset($_POST['submit'])) {
  $nama = htmlspecialchars($_POST['nama']);
  $nim = htmlspecialchars($_POST['nim']);
  $jk = htmlspecialchars($_POST['jenis_kelamin']);

  if (update_mahasiswa($nim, $nama, $jk, $nimGet)) {
    header('location: index.php');
  } else {
    header('location: components/404.php');
  }
}

?>

<?php require('./components/header.php') ?>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4>TUGAS UTS PPWEB</h4>
          <a href="index.php">Kembali</a>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="mb-3">
              <label for="nim" class="form-label">NIM</label>
              <input type="text" class="form-control" id="nim" name="nim" placeholder="masukkan nim mahasiswa..." value="<?= $mhs["nim"] ?>" required>
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="masukkan nama mahasiswa..." value="<?= $mhs["nama_mhs"] ?>" required>
            </div>
            <div class="mb-3">
              <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
              <div class="d-flex gap-4">
                <?php foreach ($jenis_kelamin as $jk) : ?>
                  <?php if ($jk['id_jk'] == $mhs['id_jk']) : ?>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" value="<?= $jk['id_jk'] ?>" id="jenis_kelamin_<?= $jk['id_jk'] ?>" checked>
                      <label class="form-check-label" for="jenis_kelamin_<?= $jk['id_jk'] ?>">
                        <?= $jk['nama_jk'] ?>
                      </label>
                    </div>
                  <?php else : ?>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" value="<?= $jk['id_jk'] ?>" id="jenis_kelamin_<?= $jk['id_jk'] ?>">
                      <label class="form-check-label" for="jenis_kelamin_<?= $jk['id_jk'] ?>">
                        <?= $jk['nama_jk'] ?>
                      </label>
                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require('./components/footer.php') ?>