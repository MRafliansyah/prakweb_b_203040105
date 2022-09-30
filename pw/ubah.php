<?php
require 'functions.php';

// ambil id dari url
$id = $_GET['id'];

// query buku berdasarkan id
$row = query("SELECT * FROM buku WHERE id_buku = $id");

// cek apakah tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script> 
            alert('data berhasil diubah!') 
            document.location.href = 'index.php';
          </script>";
  } else {
    echo "<script> alert('data gagal diubah!') </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Buku</title>
</head>

<body>
  <h3>Form Ubah Data Buku</h3>
  <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $row['id_buku']; ?>">
    <ul>
      <li>
        <label>
          Judul Buku :
          <input type="text" name="judul_buku" autofocus required value="<?= $row['judul_buku']; ?>">
        </label>
      </li>
      <li>
        <label>
          Tahun Penerbit :
          <input type=" text" name="tahun_terbit" required value="<?= $row['tahun_terbit']; ?>">
        </label>
      </li>
      <li>
        <label>
           Gambar buku :
          <input type=" text" name="gambar_buku" required value="<?= $row['gambar_buku']; ?>">
        </label>
      </li>
      <li>
        <label>
          Penerbit buku :
          <input type=" text" name="penerbit_buku" required value="<?= $row['penerbit_buku']; ?>">
        </label>
      </li>
      <li>
        <button type="submit" name="ubah">Ubah Data</button>
      </li>
      <li>
        <a href="index.php">Kembali ke daftar buku</a>
      </li>
    </ul>

  </form>
</body>

</html>