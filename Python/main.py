# File: main.py

from ProdukElektronik import ProdukElektronik

daftar_produk = []

def main():
    while True:
        print("\n--- Menu Toko Elektronik ---")
        print("1. Tambah Data Produk")
        print("2. Tampilkan Semua Data Produk")
        print("3. Update Data Produk")
        print("4. Hapus Data Produk")
        print("5. Cari Data Produk")
        print("0. Keluar")
        print("\n---------------------------")

        pilihan = input("Masukkan pilihan Anda: ")

        if pilihan == '1':
            print("\n--- Menambah Produk Baru ---")
            kode = input("Masukkan Kode: ")
            nama = input("Masukkan Nama Barang: ")
            jenis = input("Masukkan Jenis Barang: ")
            merek = input("Masukkan Merek: ")
            berat = float(input("Masukkan Berat (kg): "))

            produk_baru = ProdukElektronik(kode, nama, jenis, merek, berat)
            daftar_produk.append(produk_baru)
            print("Produk baru berhasil ditambahkan!")

        elif pilihan == '2':
            print("\n--- Daftar Semua Produk ---")
            if not daftar_produk:
                print("Belum ada produk yang tersimpan.")
            else:
                for i, produk in enumerate(daftar_produk):
                    print(f"\n--- Produk #{i+1} ---")
                    print(f"Kode         : {produk.get_kode()}")
                    print(f"Nama Barang  : {produk.get_nama_barang()}")
                    print(f"Jenis Barang : {produk.get_jenis_barang()}")
                    print(f"Merek        : {produk.get_merek()}")
                    print(f"Berat        : {produk.get_berat()} kg")

        elif pilihan == '3':
            print("\n--- Mengubah Data Produk ---")
            kode_update = input("Masukkan Kode Produk yang akan diubah: ")
            
            produk_ditemukan = None
            for produk in daftar_produk:
                if produk.get_kode() == kode_update:
                    produk_ditemukan = produk
                    break
            
            if produk_ditemukan:
                print("Masukkan data baru:")
                nama_baru = input("Nama Barang Baru: ")
                jenis_baru = input("Jenis Barang Baru: ")
                merek_baru = input("Merek Baru: ")
                berat_baru = float(input("Berat Baru (kg): "))

                produk_ditemukan.set_nama_barang(nama_baru)
                produk_ditemukan.set_jenis_barang(jenis_baru)
                produk_ditemukan.set_merek(merek_baru)
                produk_ditemukan.set_berat(berat_baru)
                
                print("Data produk berhasil diupdate!")
            else:
                print(f"Produk dengan kode '{kode_update}' tidak ditemukan.")

        elif pilihan == '4':
            print("\n--- Menghapus Data Produk ---")
            kode_hapus = input("Masukkan Kode Produk yang akan dihapus: ")

            produk_ditemukan = None
            for produk in daftar_produk:
                if produk.get_kode() == kode_hapus:
                    produk_ditemukan = produk
                    break

            if produk_ditemukan:
                daftar_produk.remove(produk_ditemukan)
                print(f"Produk dengan kode '{kode_hapus}' berhasil dihapus.")
            else:
                print(f"Produk dengan kode '{kode_hapus}' tidak ditemukan.")

        elif pilihan == '5':
            print("\n--- Mencari Data Produk ---")
            kode_cari = input("Masukkan Kode Produk yang dicari: ")

            produk_ditemukan = None
            for produk in daftar_produk:
                if produk.get_kode() == kode_cari:
                    produk_ditemukan = produk
                    break

            if produk_ditemukan:
                print("\n--- Produk Ditemukan ---")
                print(f"Kode         : {produk_ditemukan.get_kode()}")
                print(f"Nama Barang  : {produk_ditemukan.get_nama_barang()}")
                print(f"Jenis Barang : {produk_ditemukan.get_jenis_barang()}")
                print(f"Merek        : {produk_ditemukan.get_merek()}")
                print(f"Berat        : {produk_ditemukan.get_berat()} kg")
            else:
                print(f"Produk dengan kode '{kode_cari}' tidak ditemukan.")

        elif pilihan == '0':
            print("Terima kasih telah menggunakan program ini. Sampai jumpa!")
            break

        else:
            print("Pilihan tidak valid. Silakan coba lagi.")

if __name__ == "__main__":
    main()