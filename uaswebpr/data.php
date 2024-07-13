<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
   <h1> INI DATABSE PERPUSTAKAAN</h1>
   <?php
                            include_once("koneksi.php");
                            $hasil = mysqli_query($mysqli, "SELECT * FROM tbl_peminjaman ORDER BY id_pinjam DESC");
                            ?>
                            <center><a href="input.php">Tambah Data Peminjaman</a></center><br/><br/>
                            <div class ="container text-center">
                                <table class="table table-striped table-bordered table-hover mt-3">
                                    <tr class="header" text-align ="justify">
                                        <thead class ="table-dark">
                                            <th scope ="col">ID Peminjam</th>
                                            <th scope ="col">Nama Peminjam</th>
                                            <th scope ="col">Kode Buku</th>
                                            <th scope ="col">Judul</th>
                                            <th scope ="col">Waktu Peminjaman</th>
                                            <th scope ="col">Waktu Pengembalian</th>
                                            <th scope ="col">Aksi</th>
                                            
                                        </thead>
                                    </tr>
                                    <?php
                                    $i=1;
                                    while($user_data = mysqli_fetch_array($hasil)) {
                                        echo "<tr>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".$user_data['nama']."</td>";
                                        echo "<td>".$user_data['kode_buku']."</td>";
                                        echo "<td>".$user_data['judul']."</td>";
                                        echo "<td>".date('d/m/Y',strtotime($user_data['waktu_peminjaman']))."</td>";
                                        echo "<td>".date('d/m/Y',strtotime($user_data['waktu_kembali']))."</td>";
                                        echo "<td><a href='edit.php?id_pinjam=$user_data[id_pinjam]'>Edit</a> | <a href='hapus.php?id_pinjam=$user_data[id_pinjam]'>Delete</a></td></tr>";
                                        $i++;
                                    }
                                    ?>
</body>
</html>