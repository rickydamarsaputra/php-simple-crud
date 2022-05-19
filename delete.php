<?php
require('./lib/function.php');

$nim = $_GET["nim"];
if (delete_single_mahasiswa($nim)) {
  header('location: index.php');
} else {
  header('location: components/404.php');
}
