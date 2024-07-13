<html>
<head>
    <title>Add Data</title>
</head>

<body>
<a href="data.php">Go to Home</a>
<br/><br/>

<div w-50>
<form action="input.php" method="post" name="form1">
    <table width="45%" border="0">
        <tr>
            <td>Nama Peminjam</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>Kode Buku</td>
            <td><input type="text" name="kode_buku"></td>
        </tr>
        <tr>
            <td>Judul Buku</td>
            <td><input type="text" name="judul"></td>
        </tr>
        <tr>
            <td>Waktu Peminjaman</td>
            <td><input name="waktu_peminjaman"></input></td>
        </tr>
        <tr>
            <td>Waktu Pengembalian</td>
            <td><input type="text" name="waktu_kembali"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name = "Submit" value="Tambah"></td>
        </tr>
    </table>
</form>
</div>

<?php

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
    $nama= $_POST['nama'];
    $kode_buku = $_POST['kode_buku'];
    $judul = $_POST['judul'];
    $waktu_peminjaman= $_POST['waktu_peminjaman'];
    $waktu_kembali = $_POST['waktu_kembali'];


    // include database connection file
    include_once("koneksi.php");

    // Insert user data into table
    $hasil = mysqli_query($mysqli, "INSERT INTO tbl_peminjaman(nama,kode_buku,judul,waktu_peminjaman,waktu_kembali) VALUES('$nama','$kode_buku','$judul','$waktu_peminjaman','$waktu_kembali')");

    // Show message when user added
    echo "User added successfully. <a href='data.php'>View Data</a>";
}
?>
</body>
</html>