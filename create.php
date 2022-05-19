<?php
require('./lib/function.php');

if (isset($_POST['submit'])) {
  $nim = htmlspecialchars($_POST['nim']);
  $nama = htmlspecialchars($_POST['nama']);
  $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);

  if (create_mahasiswa($nim, $nama, $jenis_kelamin)) {
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
              <input type="text" class="form-control" id="nim" name="nim" placeholder="masukkan nim mahasiswa..." required>
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="masukkan nama mahasiswa..." required>
            </div>
            <div class="mb-3">
              <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
              <div class="d-flex gap-4">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" id="jenis_kelamin_laki" checked>
                  <label class="form-check-label" for="jenis_kelamin_laki">
                    Laki-Laki
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" id="jenis_kelamin_perempuan">
                  <label class="form-check-label" for="jenis_kelamin_perempuan">
                    Perempuan
                  </label>
                </div>
              </div>
            </div>
            <div class="d-flex gap-2">
              <button type="submit" name="submit" class="btn btn-success">Submit</button>
              <button type="reset" class="btn btn-secondary">Clear</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require('./components/footer.php') ?>