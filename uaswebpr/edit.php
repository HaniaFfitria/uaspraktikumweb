<?php
// include database connection file
include_once("koneksi.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
    $id_pinjam=$_POST['id_pinjam'];
    $nama= $_POST['nama'];
    $kode_buku = $_POST['kode_buku'];
    $judul= $_POST['judul'];
    $waktu_peminjaman= $_POST['waktu_peminjaman'];
    $waktu_kembali= $_POST['waktu_kembali'];


    // update user data
    $hasil = mysqli_query($mysqli, "UPDATE tbl_peminjaman SET nama='$nama',kode_buku='$kode_buku',judul='$judul',waktu_peminjaman='$waktu_peminjaman',waktu_kembali='$waktu_kembali' WHERE id_pinjam=$id_pinjam");

    // Redirect to homepage to display updated user in list
    header("Location: data.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id_pinjam = $_GET['id_pinjam'];

// Fetech user data based on id
$hasil = mysqli_query($mysqli, "SELECT * FROM tbl_peminjaman WHERE id_pinjam=$id_pinjam");

while($user_data = mysqli_fetch_array($hasil))
{
    $nama = $user_data['nama'];
    $kode_buku = $user_data['kode_buku'];
    $judul= $user_data['judul'];
    $waktu_peminjaman = $user_data['waktu_peminjaman'];
    $waktu_kembali = $user_data['waktu_kembali'];
    
}
?>
<html>
<head>
    <title>Edit User Data</title>
</head>

<body>
<a href="data.php">Home</a>
<br/><br/>

<div class ="w-50 border p-3 mt-3">
<form name="update_user" method="post" action="edit.php">
<table border="0">
        <tr>
            <td>Nama Peminjam</td>
            <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
        </tr>
        <tr>
            <td>Kode Buku</td>
            <td><input type="text" name="kode_buku" value=<?php echo $kode_buku;?>></td>
        </tr>
        <tr>
            <td>Judul Buku</td>
            <td><input type="text" name="judul" value=<?php echo $judul;?>></td>
        </tr>
        <tr>
            <td>Waktu Peminjaman</td>
            <td><input type="text" name="waktu_peminjaman" value=<?php echo $waktu_peminjaman;?>></td>
        </tr>
        <tr>
            <td>Waktu Kembali</td>
            <td><input type="text" name="waktu_kembali" value=<?php echo $waktu_kembali;?>></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id_pinjam" value=<?php echo $_GET['id_pinjam'];?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</div>
</body>
</html>