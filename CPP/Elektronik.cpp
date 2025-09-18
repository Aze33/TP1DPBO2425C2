#include <iostream>
#include <string>

using namespace std;

class ProdukElektronik {
// Atribut bersifat private
private:
    string kode;
    string namaBarang;
    string jenisBarang;
    string merek;
    double berat;

// Method yang bersifat public
public:
    // Constructor untuk inisiasi atribut
    ProdukElektronik(string kode, string nama, string jenis, string m, double b) {
        this->kode = kode;
        this->namaBarang = nama;
        this->jenisBarang = jenis;
        this->merek = m;
        this->berat = b;
    }

    // --- GETTER untuk mengakses atribut ---
    string getKode() {
        return this->kode;
    }

    string getNamaBarang() {
        return this->namaBarang;
    }

    string getJenisBarang() {
        return this->jenisBarang;
    }

    string getMerek() {
        return this->merek;
    }

    double getBerat() {
        return this->berat;
    }

    // --- SETTER untuk mengubah atribut ---
    void setNamaBarang(string nama) {
        this->namaBarang = nama;
    }

    void setJenisBarang(string jenis) {
        this->jenisBarang = jenis;
    }

    void setMerek(string m) {
        this->merek = m;
    }

    void setBerat(double b) {
        this->berat = b;
    }

    // Destruktor
    ~ProdukElektronik() {
    }
};