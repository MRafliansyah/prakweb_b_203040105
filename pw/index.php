<?php
require 'functions.php';
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "prakweb_2022_b_203040105");

// ambil dari tabel film / query
$result = mysqli_query($conn, "SELECT * FROM buku");

// ubah data ke dalam array
// $row = mysqli_fetch_row($result); // array numerik
// $row = mysqli_fetch_assoc($result); // array associative
// $row = mysqli_fetch_array($result); // keduanya
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
}
// tampung ke variabel buku
$buku = query("SELECT * FROM buku");

// ketika tombol cari di klik
if(isset($_POST['cari'])) {
  $buku = cari($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Buku</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <h1>Raf store book</h1>
  <a href="tambah.php"> Tambah Buku</a>
  <br>
  <form action="" method="POST">
    <input type="text" name="keyword" size="30" placeholder="masukan pencarian.." autocomplete="of" autofocus>
    <button type="submit" name="cari">Cari!</button>
    </from>
  
  <table border="1" cellpading="10" cellspacing="0">
    <tr>
      <th>No</th>
      <th>Judul Buku</th>
      <th>Tahun Terbit</th>
      <th>Gambar</th>
      <th>Penerbit</th>
      <th>Aksi</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($buku as $row) : ?>
      <tr>
        
        <td><?= $i++; ?></td>
        <td><?= $row["judul_buku"]; ?> </td>
        <td><?= $row["tahun_terbit"]; ?></td>
        <td><img src="gambar/<?= $row["gambar_buku"]; ?>" alt="" width="100"></td>
        <td><?= $row["penerbit_buku"]; ?> </td>
        <td>
        <a href="ubah.php?id=<?= $row['id_buku']; ?>">ubah</a>
        <a href="hapus.php?id=<?= $row['id_buku']; ?>" onclick="return confirm('apakah anda yakin?');">hapus</a></li>
        </td>
        </tr>
    <?php endforeach; ?>

   
  </table>

</body>

</html>