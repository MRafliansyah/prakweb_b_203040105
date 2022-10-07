<?php

class About {
    public function index($nama = 'Rafliansyah', $pekerjaan = 'peternak ikan')
    {
        echo "Halo, nama saya $nama, saya adalah seorang $pekerjaan";
    }
    public function page()
    {
        echo 'About/page';
    }
}