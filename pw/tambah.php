<?php
require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script> 
            alert('data berhasil ditambahkan!') 
            document.location.href = 'index.php';
          </script>";
  } else {
    echo "<script> alert('data gagal ditambahkan!') </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Buku</title>
</head>

<body>
  <h3>Form Tambah Data Buku</h3>
  <form action="" method="POST">
    <ul>
      <li>
        <label>
          Judul Buku :
          <input type="text" name="judul_buku" autofocus required>
        </label>
      </li>
      <li>
        <label>
          Penerbit Buku :
          <input type="text" name="penerbit_buku" required>
        </label>
      </li>
      <li>
        <label>
          Tahun Penerbit :
          <input type="text" name="tahun_terbit" required>
        </label>
      </li>
      <li>
        <label>
          Gambar Buku :
          <input type="text" name="gambar_buku" required>
        </label>
      </li>
      <li>
        <button type="submit" name="tambah">Tambah Data</button>
      </li>
      <li>
        <a href="index.php">Kembali ke daftar buku</a>
      </li>
    </ul>

  </form>
</body>

</html>