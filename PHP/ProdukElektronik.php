<?php

class ProdukElektronik
{
    private $kode;
    private $namaBarang;
    private $jenisBarang;
    private $merek;
    private $gambar; // Atribut untuk path gambar
    private $berat;

    public function __construct($kode, $namaBarang, $jenisBarang, $merek, $gambar, $berat)
    {
        $this->kode = $kode;
        $this->namaBarang = $namaBarang;
        $this->jenisBarang = $jenisBarang;
        $this->merek = $merek;
        $this->gambar = $gambar;
        $this->berat = $berat;
    }

    // --- GETTER ---
    public function getKode() { return $this->kode; }
    public function getNamaBarang() { return $this->namaBarang; }
    public function getJenisBarang() { return $this->jenisBarang; }
    public function getMerek() { return $this->merek; }
    public function getGambar() { return $this->gambar; }
    public function getBerat() { return $this->berat; }

    // --- SETTER ---
    public function setNamaBarang($namaBarang) { $this->namaBarang = $namaBarang; }
    public function setJenisBarang($jenisBarang) { $this->jenisBarang = $jenisBarang; }
    public function setMerek($merek) { $this->merek = $merek; }
    public function setGambar($gambar) { $this->gambar = $gambar; }
    public function setBerat($berat) { $this->berat = $berat; }
}
?>