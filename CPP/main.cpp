#include <bits/stdc++.h> 
#include "Elektronik.cpp"

using namespace std;

int main() {
    // Vector untuk menyimpan semua objek produk
    vector<ProdukElektronik> daftarProduk;
    int pilihan = -1;

    while (pilihan != 0) {
        // Tampilkan menu
        cout << "\n--- Pendataan Toko Elektronik ---" << endl;
        cout << "1. Tambah Data Produk" << endl;
        cout << "2. Tampilkan Semua Data Produk" << endl;
        cout << "3. Update Data Produk" << endl;
        cout << "4. Hapus Data Produk" << endl;
        cout << "5. Cari Data Produk" << endl;
        cout << "0. Keluar" << endl;
        cout << "Masukkan pilihan Anda: ";
        cin >> pilihan;

        // Membersihkan buffer input setelah membaca angka
        cin.ignore(numeric_limits<streamsize>::max(), '\n');

        switch (pilihan) {
            case 1: {
                // --- Fitur Tambah Data ---
                cout << "\n--- Menambah Produk Baru ---" << endl;
                string kode, nama, jenis, merek;
                double berat;

                cout << "Masukkan Kode: ";
                getline(cin, kode);
                cout << "Masukkan Nama Barang: ";
                getline(cin, nama);
                cout << "Masukkan Jenis Barang: ";
                getline(cin, jenis);
                cout << "Masukkan Merek: ";
                getline(cin, merek);
                cout << "Masukkan Berat (kg): ";
                cin >> berat;

                daftarProduk.push_back(ProdukElektronik(kode, nama, jenis, merek, berat));
                cout << "Produk baru berhasil ditambahkan!" << endl;
                break;
            }
            case 2: {
                // --- Fitur Tampilkan Data ---
                cout << "\n--- Daftar Semua Produk ---" << endl;
                if (daftarProduk.empty()) {
                    cout << "Belum ada produk yang tersimpan." << endl;
                } else {
                    for (int i = 0; i < daftarProduk.size(); i++) {
                        cout << "\n--- Produk #" << i + 1 << " ---" << endl;
                        cout << "Kode         : " << daftarProduk[i].getKode() << endl;
                        cout << "Nama Barang  : " << daftarProduk[i].getNamaBarang() << endl;
                        cout << "Jenis Barang : " << daftarProduk[i].getJenisBarang() << endl;
                        cout << "Merek        : " << daftarProduk[i].getMerek() << endl;
                        cout << "Berat        : " << daftarProduk[i].getBerat() << " kg" << endl;
                    }
                }
                break;
            }
            case 3: {
                // --- Fitur Update Data ---
                cout << "\n--- Mengubah Data Produk ---" << endl;
                string kodeUpdate;
                cout << "Masukkan Kode Produk yang akan diubah: ";
                getline(cin, kodeUpdate);

                bool ditemukan = false;
                for (int i = 0; i < daftarProduk.size(); i++) {
                    if (daftarProduk[i].getKode() == kodeUpdate) {
                        ditemukan = true;
                        string namaBaru, jenisBaru, merekBaru;
                        double beratBaru;

                        cout << "Masukkan data baru:" << endl;
                        cout << "Nama Barang Baru: ";
                        getline(cin, namaBaru);
                        cout << "Jenis Barang Baru: ";
                        getline(cin, jenisBaru);
                        cout << "Merek Baru: ";
                        getline(cin, merekBaru);
                        cout << "Berat Baru (kg): ";
                        cin >> beratBaru;

                        daftarProduk[i].setNamaBarang(namaBaru);
                        daftarProduk[i].setJenisBarang(jenisBaru);
                        daftarProduk[i].setMerek(merekBaru);
                        daftarProduk[i].setBerat(beratBaru);
                        
                        cout << "Data produk berhasil diupdate!" << endl;
                        break;
                    }
                }
                if (!ditemukan) {
                    cout << "Produk dengan kode '" << kodeUpdate << "' tidak ditemukan." << endl;
                }
                break;
            }
            case 4: {
                // --- Fitur Hapus Data ---
                cout << "\n--- Menghapus Data Produk ---" << endl;
                string kodeHapus;
                cout << "Masukkan Kode Produk yang akan dihapus: ";
                getline(cin, kodeHapus);

                bool ditemukan = false;
                for (int i = 0; i < daftarProduk.size(); i++) {
                    if (daftarProduk[i].getKode() == kodeHapus) {
                        ditemukan = true;
                        daftarProduk.erase(daftarProduk.begin() + i);
                        cout << "Produk berhasil dihapus." << endl;
                        break;
                    }
                }
                if (!ditemukan) {
                    cout << "Produk dengan kode '" << kodeHapus << "' tidak ditemukan." << endl;
                }
                break;
            }
            case 5: {
                // --- Fitur Cari Data ---
                cout << "\n--- Mencari Data Produk ---" << endl;
                string kodeCari;
                cout << "Masukkan Kode Produk yang dicari: ";
                getline(cin, kodeCari);

                bool ditemukan = false;
                for (int i = 0; i < daftarProduk.size(); i++) {
                    if (daftarProduk[i].getKode() == kodeCari) {
                        ditemukan = true;
                        cout << "\n--- Produk Ditemukan ---" << endl;
                        cout << "Kode         : " << daftarProduk[i].getKode() << endl;
                        cout << "Nama Barang  : " << daftarProduk[i].getNamaBarang() << endl;
                        cout << "Jenis Barang : " << daftarProduk[i].getJenisBarang() << endl;
                        cout << "Merek        : " << daftarProduk[i].getMerek() << endl;
                        cout << "Berat        : " << daftarProduk[i].getBerat() << " kg" << endl;
                        break;
                    }
                }
                if (!ditemukan) {
                    cout << "Produk dengan kode '" << kodeCari << "' tidak ditemukan." << endl;
                }
                break;
            }
            case 0:
                cout << "Terima kasih telah menggunakan program ini. Sampai jumpa!" << endl;
                break;
            default:
                cout << "Pilihan tidak valid. Silakan coba lagi." << endl;
                break;
        }
    }

    return 0;
}