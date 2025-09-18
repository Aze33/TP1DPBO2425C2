class ProdukElektronik:
    def __init__(self, kode, nama_barang, jenis_barang, merek, berat):
        self._kode = kode
        self._nama_barang = nama_barang
        self._jenis_barang = jenis_barang
        self._merek = merek
        self._berat = berat

    # --- GETTER ---
    def get_kode(self):
        return self._kode

    def get_nama_barang(self):
        return self._nama_barang

    def get_jenis_barang(self):
        return self._jenis_barang

    def get_merek(self):
        return self._merek

    def get_berat(self):
        return self._berat

    # --- SETTER ---
    def set_kode(self, kode):
        self._kode = kode

    def set_nama_barang(self, nama_barang):
        self._nama_barang = nama_barang

    def set_jenis_barang(self, jenis_barang):
        self._jenis_barang = jenis_barang

    def set_merek(self, merek):
        self._merek = merek

    def set_berat(self, berat):
        self._berat = berat