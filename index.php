<?php

// 1. Abstraksi (Abstraction)
// Membuat kelas abstrak sebagai kerangka dasar
abstract class Pegawai {
    // 2. Enkapsulasi (Encapsulation)
    // Properti di-set private agar tidak bisa diakses langsung dari luar
    private $nama;
    private $gajiDasar;

    public function __construct($nama, $gajiDasar) {
        $this->nama = $nama;
        $this->gajiDasar = $gajiDasar;
    }

    // Method Getter untuk mengakses properti private
    public function getNama() {
        return $this->nama;
    }

    public function getGajiDasar() {
        return $this->gajiDasar;
    }

    // Method abstrak yang wajib diimplementasikan oleh subclass
    abstract public function hitungGaji();
}

// 3. Pewarisan (Inheritance)
// Kelas PegawaiTetap diturunkan dari kelas Pegawai
class PegawaiTetap extends Pegawai {
    private $tunjangan;

    public function __construct($nama, $gajiDasar, $tunjangan) {
        parent::__construct($nama, $gajiDasar);
        $this->tunjangan = $tunjangan;
    }

    // 4. Polimorfisme (Polymorphism)
    // Mengoverride method hitungGaji sesuai logika Pegawai Tetap
    public function hitungGaji() {
        return $this->getGajiDasar() + $this->tunjangan;
    }
}

// Kelas PegawaiKontrak diturunkan dari kelas Pegawai
class PegawaiKontrak extends Pegawai {
    private $jamKerja;
    private $tarifPerJam;

    public function __construct($nama, $jamKerja, $tarifPerJam) {
        // Gaji dasar untuk pegawai kontrak kita set 0 karena hitungannya per jam
        parent::__construct($nama, 0); 
        $this->jamKerja = $jamKerja;
        $this->tarifPerJam = $tarifPerJam;
    }

    // 4. Polimorfisme (Polymorphism)
    // Mengoverride method hitungGaji sesuai logika Pegawai Kontrak
    public function hitungGaji() {
        return $this->jamKerja * $this->tarifPerJam;
    }
}

// --- Output yang Diharapkan ---

// 1. Instansiasi Pegawai Tetap (Joko)
$joko = new PegawaiTetap("Joko", 5000000, 1000000);
echo "Nama: " . $joko->getNama() . " | Gaji: Rp" . number_format($joko->hitungGaji(), 0, ',', '.') . "<br>";
// 2. Instansiasi Pegawai Kontrak (Budi)
$budi = new PegawaiKontrak("Budi", 100, 50000);
echo "Nama: " . $budi->getNama() . " | Gaji: Rp" . number_format($budi->hitungGaji(), 0, ',', '.') . "\n";

?>