public class ProdukElektronik {
    private String kode;
    private String namaBarang;
    private String jenisBarang;
    private String merek;
    private double berat;

    // Constructor
    public ProdukElektronik(String kode, String namaBarang, String jenisBarang, String merek, double berat) {
        this.kode = kode;
        this.namaBarang = namaBarang;
        this.jenisBarang = jenisBarang;
        this.merek = merek;
        this.berat = berat;
    }

    // --- METODE GETTER ---
    public String getKode() {
        return this.kode;
    }

    public String getNamaBarang() {
        return this.namaBarang;
    }

    public String getJenisBarang() {
        return this.jenisBarang;
    }

    public String getMerek() {
        return this.merek;
    }

    public double getBerat() {
        return this.berat;
    }

    // --- METODE SETTER ---
    public void setNamaBarang(String namaBarang) {
        this.namaBarang = namaBarang;
    }

    public void setJenisBarang(String jenisBarang) {
        this.jenisBarang = jenisBarang;
    }

    public void setMerek(String merek) {
        this.merek = merek;
    }

    public void setBerat(double berat) {
        this.berat = berat;
    }
}