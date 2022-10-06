<?php

use Produk as GlobalProduk;

class Produk
{

  public $judul,
         $penulis,
         $penerbit,
         $harga,
         $jmlHalaman,
         $waktuMain,
         $tipe;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", 
  $harga = 0,$jmlHalaman = 0,$waktuMain = 0,$tipe
) {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
    $this->jmlHalaman = $jmlHalaman;
    $this->waktuMain = $waktuMain;
    $this->tipe = $tipe;
  }

  public function getLabel() {
    return "$this->penulis, $this->penerbit";
  }

  public function getinfolengkap() {
    // komik : Naruto | Mashashi, shonen Jump (Rp. 30000)| - 100 Halaman.
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga
        })";
        if( $this->tipe == "komik" ) {
            $str .= "{$this->jmlHalaman} Halaman.";
        } else if ( $this->tipe == "Game" ) {
            $str .="~{$this->waktuMain} jam.";
    }
    return $str;
    }
}

class CetakInfoProduk
{
  public function cetak(Produk $produk)
  {
    $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
    return $str;
  }
}



$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0, "Komik");
$produk2 = new Produk("Melangkah", "Miiko", "sagaras", 300000, 0, 50, "Game");

// komik : Naruto | Mashashi, shonen Jump (Rp. 30000)| - 100 Halaman.
// Game : Uncharted | Neil Druckmann, Sony computer (Rp. 25000) ~ 50 Jam.

echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();