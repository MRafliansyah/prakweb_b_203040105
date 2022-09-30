<?php
function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'prakweb_2022_b_203040105');
}

function query($query)
{
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $judul_buku = htmlspecialchars($data['judul_buku']);
  $tahun_terbit = htmlspecialchars($data['tahun terbit']);
  $gambar_buku = htmlspecialchars($data['gambar_buku']);
  $penerbit_buku = htmlspecialchars($data['penerbit_buku']);

  $query = "INSERT INTO
              buku
            VALUES
            (null, '$judul_buku', '$tahun_terbit', '$gambar_buku', '$penerbit_buku');
           ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM buku WHERE id_buku = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $id_buku = $data['id'];
  $judul_buku = htmlspecialchars($data['judul_buku']);
  $tahun_terbit = htmlspecialchars($data['tahun_terbit']);
  $gambar_buku = htmlspecialchars($data['gambar_buku']);
  $penerbit_buku = htmlspecialchars($data['penerbit_buku']);

  $query = "UPDATE buku SET
              judul_buku = '$judul_buku',
              tahun_terbit = '$tahun_terbit',
              gambar_buku = '$gambar_buku',
              penerbit_buku = '$penerbit_buku'
            WHERE id_buku = '$id_buku'
           ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
