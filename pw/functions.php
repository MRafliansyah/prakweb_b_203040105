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

function cari($keyword) {
  $conn = koneksi();

  $query = "SELECT * FROM buku
                  WHERE
                      judul_buku LIKE '$keyword' OR
                      penerbit_buku LIKE '%keyword%'
                      ";

$result = mysqli_query($conn, $query);

$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
$rows[] = $row;

}

return $rows;
      
}



function login($data)
{
  $conn = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  // cek dulu username 
  if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
    // cek password
    if (password_verify($password, $user['password'])) {
      // set session
      $_SESSION['login'] = true;

      header("Location: index.php");
      exit;
    }
  }
  return [
    'error' => true,
    'pesan' => 'Username / Password Salah!'
  ];
}

function registrasi($data)
{
    $conn = koneksi();

    $username = htmlspecialchars(strtolower($data['username']));
    $password1 = mysqli_real_escape_string($conn, $data['password1']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

  // jika username / password kosong
    if (empty($username) || empty($password2) || empty($password2)) {
    echo "<script>
            alert('username / password tidak boleh kosong!');
            document.location.href = 'registrasi.php';
            </script>";
    return false;
    }

  // jika username sudah ada 
  if (query("SELECT * FROM user WHERE username = '$username'")) {
    echo "<script>
            alert('username sudah terdaftar!');
            document.location.href = 'registrasi.php';
            </script>";
    return false;
    }

  // jika konfirmasi password tidak sesuai
    if ($password1 !== $password2) {
    echo "<script>
            alert('konfirmasi password tidak sesuai!');
            document.location.href = 'registrasi.php';
            </script>";
    return false;
    }

  // jika password < 5 digit
    if (strlen($password1) < 5) {
    echo "<script>
            alert('password terlalu pendek!');
            document.location.href = 'registrasi.php';
            </script>";
    return false;
    }

  // jika username & password sudah sesuai
  // enkripsi password
    $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  // insert ke tabel user
    $query = "INSERT INTO user
                VALUES
            (null, '$username', '$password_baru')
            ";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
}