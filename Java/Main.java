
import java.util.ArrayList;
import java.util.InputMismatchException;
import java.util.Scanner;

public class Main {
    // ArrayList untuk menyimpan semua objek produk
    private static ArrayList<ProdukElektronik> daftarProduk = new ArrayList<>();
    // Scanner untuk menerima input dari user
    private static Scanner scanner = new Scanner(System.in);

    public static void main(String[] args) {
        while (true) {
            tampilkanMenu();
            try {
                int pilihan = scanner.nextInt();
                scanner.nextLine(); // Membersihkan newline character dari buffer

                switch (pilihan) {
                    case 1:
                        tambahProduk();
                        break;
                    case 2:
                        tampilkanSemuaProduk();
                        break;
                    case 3:
                        updateProduk();
                        break;
                    case 4:
                        hapusProduk();
                        break;
                    case 5:
                        cariProduk();
                        break;
                    case 0:
                        System.out.println("\nTerima kasih! Sampai jumpa lagi!");
                        return; // Keluar dari program
                    default:
                        System.out.println("\nPilihan tidak valid. Silakan coba lagi.");
                }
            } catch (InputMismatchException e) {
                System.out.println("\nInput harus berupa angka! Silakan coba lagi.");
                scanner.next(); // Membersihkan input yang salah
            }
        }
    }

    private static void tampilkanMenu() {
        System.out.println("\n=========================================");
        System.out.println("|        MENU TOKO ELEKTRONIK         |");
        System.out.println("=========================================");
        System.out.println("| 1. Tambah Data Produk               |");
        System.out.println("| 2. Tampilkan Semua Data Produk      |");
        System.out.println("| 3. Update Data Produk               |");
        System.out.println("| 4. Hapus Data Produk                |");
        System.out.println("| 5. Cari Data Produk                 |");
        System.out.println("| 0. Keluar                           |");
        System.out.println("=========================================");
        System.out.print(" -> Masukkan pilihan Anda: ");
    }

    private static void tambahProduk() {
        System.out.println("\n--- Menambah Produk Baru ---");
        System.out.print("Masukkan Kode: ");
        String kode = scanner.nextLine();
        System.out.print("Masukkan Nama Barang: ");
        String nama = scanner.nextLine();
        System.out.print("Masukkan Jenis Barang: ");
        String jenis = scanner.nextLine();
        System.out.print("Masukkan Merek: ");
        String merek = scanner.nextLine();
        System.out.print("Masukkan Berat (kg): ");
        double berat = scanner.nextDouble();
        scanner.nextLine(); // Membersihkan buffer

        daftarProduk.add(new ProdukElektronik(kode, nama, jenis, merek, berat));
        System.out.println("Produk baru berhasil ditambahkan!");
    }

    private static void tampilkanSemuaProduk() {
        System.out.println("\n--- Daftar Semua Produk ---");
        if (daftarProduk.isEmpty()) {
            System.out.println("Belum ada produk yang tersimpan.");
        } else {
            for (int i = 0; i < daftarProduk.size(); i++) {
                ProdukElektronik produk = daftarProduk.get(i);
                System.out.println("\n--- Produk #" + (i + 1) + " ---");
                System.out.println("Kode         : " + produk.getKode());
                System.out.println("Nama Barang  : " + produk.getNamaBarang());
                System.out.println("Jenis Barang : " + produk.getJenisBarang());
                System.out.println("Merek        : " + produk.getMerek());
                System.out.println("Berat        : " + produk.getBerat() + " kg");
            }
        }
    }

    private static void updateProduk() {
        System.out.println("\n--- Mengubah Data Produk ---");
        System.out.print("Masukkan Kode Produk yang akan diubah: ");
        String kodeUpdate = scanner.nextLine();

        ProdukElektronik produkDitemukan = null;
        for (ProdukElektronik produk : daftarProduk) {
            if (produk.getKode().equals(kodeUpdate)) {
                produkDitemukan = produk;
                break;
            }
        }

        if (produkDitemukan != null) {
            System.out.println("Masukkan data baru:");
            System.out.print("Nama Barang Baru: ");
            produkDitemukan.setNamaBarang(scanner.nextLine());
            System.out.print("Jenis Barang Baru: ");
            produkDitemukan.setJenisBarang(scanner.nextLine());
            System.out.print("Merek Baru: ");
            produkDitemukan.setMerek(scanner.nextLine());
            System.out.print("Berat Baru (kg): ");
            produkDitemukan.setBerat(scanner.nextDouble());
            scanner.nextLine(); // Membersihkan buffer
            System.out.println("Data produk berhasil diupdate! ");
        } else {
            System.out.println("Produk dengan kode '" + kodeUpdate + "' tidak ditemukan.");
        }
    }

    private static void hapusProduk() {
        System.out.println("\n--- Menghapus Data Produk ---");
        System.out.print("Masukkan Kode Produk yang akan dihapus: ");
        String kodeHapus = scanner.nextLine();

        boolean isRemoved = daftarProduk.removeIf(produk -> produk.getKode().equals(kodeHapus));

        if (isRemoved) {
            System.out.println("Produk berhasil dihapus. ");
        } else {
            System.out.println("Produk dengan kode '" + kodeHapus + "' tidak ditemukan.");
        }
    }

    private static void cariProduk() {
        System.out.println("\n--- Mencari Data Produk ---");
        System.out.print("Masukkan Kode Produk yang dicari: ");
        String kodeCari = scanner.nextLine();

        ProdukElektronik produkDitemukan = null;
        for (ProdukElektronik produk : daftarProduk) {
            if (produk.getKode().equals(kodeCari)) {
                produkDitemukan = produk;
                break;
            }
        }

        if (produkDitemukan != null) {
            System.out.println("\n--- Produk Ditemukan ---");
            System.out.println("Kode         : " + produkDitemukan.getKode());
            System.out.println("Nama Barang  : " + produkDitemukan.getNamaBarang());
            System.out.println("Jenis Barang : " + produkDitemukan.getJenisBarang());
            System.out.println("Merek        : " + produkDitemukan.getMerek());
            System.out.println("Berat        : " + produkDitemukan.getBerat() + " kg");
        } else {
            System.out.println("Produk dengan kode '" + kodeCari + "' tidak ditemukan.");
        }
    }
}