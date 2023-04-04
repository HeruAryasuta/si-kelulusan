<?php
include '../config.php';

$no_ujian = $_POST['no_ujian'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$n_bin = $_POST['n_bin'];
$n_bing = $_POST['n_bing'];
$n_mat = $_POST['n_mat'];
$n_bio = $_POST['n_bio'];
$status = $_POST['status'];

    mysqli_query($db_conn,"INSERT INTO siswa values('$no_ujian', '$nama', '$kelas', '$n_bin', '$n_mat', '$n_bing', '$n_bio', '$n_bio')");
    header("location: siswa.php");
?>