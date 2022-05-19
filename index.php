<?php
require('./lib/function.php');

$mahasiswa = get_all_mahasiswa();

$mhs_jk = count_jenis_kelamin_mahasiswa();

if (isset($_POST['search'])) {
  $nama = $_POST['nama'];

  $mahasiswa = search_mahasiswa($nama);
}
?>

<?php require('./components/header.php') ?>
<div class="container mt-5">
  <div class="row d-flex justify-content-center align-items-stretch">
    <div class="col-lg-8 mb-4 mb-lg-0">
      <div class="card h-100">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4>TUGAS UTS PPWEB</h4>
          <a href="create.php">Tambah Data Mahasiswa</a>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="mb-3 d-flex gap-2">
              <input type="text" class="form-control" name="nama" placeholder="masukkan nama mahasiswa...">
              <button type="submit" name="search" class="btn btn-primary">Search</button>
            </div>
          </form>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">NIM</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($mahasiswa as $index => $mhs) : ?>
                  <tr>
                    <th scope="row"><?= ($index + 1) ?></th>
                    <td><?= $mhs['nim'] ?></td>
                    <td><span class="text-capitalize"><?= $mhs["nama_mhs"] ?></span></td>
                    <td><?= $mhs['nama_jk'] ?></td>
                    <td class="d-flex gap-2">
                      <a href="delete.php?nim=<?= $mhs["nim"] ?>" class="btn btn-danger btn-sm">delete</a>
                      <a href="update.php?nim=<?= $mhs["nim"] ?>" class="btn btn-success btn-sm">update</a>
                      <a href="detail.php?nim=<?= $mhs["nim"] ?>" class="btn btn-info btn-sm text-white">detail</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg">
      <div class="card">
        <div class="card-body">
          <div>
            <h4 class="text-center text-capitalize text-muted">presentase jenis kelamin</h4>
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require('./components/footer.php') ?>