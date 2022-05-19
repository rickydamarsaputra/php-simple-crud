<?php
require('./lib/function.php');

$nim = $_GET["nim"];

$mhs = get_single_mahasiswa($nim);

if (is_null($mhs)) {
  header('location: components/404.php');
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
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" readonly value="<?= $mhs["nama_mhs"] ?>">
          </div>
          <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" readonly value="<?= $mhs["nim"] ?>">
          </div>
          <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" id="jenis_kelamin" readonly value="<?= $mhs["nama_jk"] ?>">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require('./components/footer.php') ?>