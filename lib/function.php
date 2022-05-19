<?php

$conn = mysqli_connect('localhost', 'root', '', 'uts_ppweb');
$jenis_kelamin = [
  [
    'id_jk' => 'L',
    'nama_jk' => 'Laki-Laki'
  ],
  [
    'id_jk' => 'P',
    'nama_jk' => 'Perempuan'
  ]
];

function get_all_mahasiswa()
{
  global $conn;

  $result = mysqli_query($conn, "SELECT * FROM mahasiswa INNER JOIN jenis_kelamin ON mahasiswa.id_jk = jenis_kelamin.id_jk  ORDER BY mahasiswa.id_jk ASC");
  $mahasiswa = [];

  while ($data = mysqli_fetch_assoc($result)) {
    $mahasiswa[] = $data;
  }

  return $mahasiswa;
}

function get_single_mahasiswa($nim)
{
  global $conn;

  $result = mysqli_query($conn, "SELECT * FROM mahasiswa INNER JOIN jenis_kelamin ON mahasiswa.id_jk = jenis_kelamin.id_jk WHERE nim = '$nim'");

  return mysqli_fetch_assoc($result);
}

function count_jenis_kelamin_mahasiswa()
{
  global $conn;

  $mhs_l = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(nim) as count FROM mahasiswa WHERE id_jk='L'"))['count'];
  $mhs_p = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(nim) as count FROM mahasiswa WHERE id_jk='P'"))['count'];

  return [$mhs_l, $mhs_p];
}

function search_mahasiswa($nama)
{
  global $conn;

  $result = mysqli_query($conn, "SELECT * FROM mahasiswa INNER JOIN jenis_kelamin ON mahasiswa.id_jk = jenis_kelamin.id_jk WHERE nama_mhs LIKE '%$nama%'");
  $mahasiswa = [];

  while ($data = mysqli_fetch_assoc($result)) {
    $mahasiswa[] = $data;
  }

  return $mahasiswa;
}

function create_mahasiswa($nim, $nama, $id_jk)
{
  global $conn;

  mysqli_query($conn, "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$id_jk')");

  return mysqli_affected_rows($conn);
}

function update_mahasiswa($nim, $nama, $jk, $nimGet)
{
  global $conn;

  mysqli_query($conn, "UPDATE mahasiswa SET nim='$nim', nama_mhs='$nama', id_jk='$jk' WHERE nim = $nimGet");

  return mysqli_affected_rows($conn);
}

function delete_single_mahasiswa($nim)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim = $nim");

  return mysqli_affected_rows($conn);
}
