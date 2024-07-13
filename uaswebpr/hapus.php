<?php
// include database connection file
include_once("koneksi.php");

// Mendapatkan id_pinjam dari parameter GET
$id_pinjam = $_GET['id'];

// Delete user row from table based on given id
// Perlu menggunakan parameterized query untuk menghindari SQL injection
$stmt = $mysqli->prepare("DELETE FROM tbl_peminjaman WHERE id_pinjam = ?");
$stmt->bind_param("i", $id_pinjam);
$stmt->execute();
$stmt->close();

// Setelah menghapus, redirect ke halaman data.php
header("Location: data.php");
exit();
?>
