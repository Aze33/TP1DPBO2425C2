<?php
// File: index.php

// PENTING: Impor class SEBELUM memulai session
require_once 'ProdukElektronik.php';

// Baru mulai session setelah class-nya dikenali
session_start();

// Inisialisasi session untuk menyimpan data produk jika belum ada
if (!isset($_SESSION['daftar_produk'])) {
    $_SESSION['daftar_produk'] = [];
}

// --- LOGIKA PEMROSESAN (CONTROLLER) ---
// (Logika PHP di sini tetap sama persis seperti sebelumnya)
// ...
// Logika untuk Hapus Data (melalui link GET)
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['kode'])) {
    foreach ($_SESSION['daftar_produk'] as $index => $produk) {
        if ($produk->getKode() == $_GET['kode']) {
            unset($_SESSION['daftar_produk'][$index]);
            break;
        }
    }
    header("Location: index.php"); 
    exit();
}

// Logika untuk Tambah & Update Data (melalui form POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = $_POST['kode'];
    $nama = $_POST['namaBarang'];
    $jenis = $_POST['jenisBarang'];
    $merek = $_POST['merek'];
    $gambar = $_POST['gambar'];
    $berat = $_POST['berat'];

    if ($_POST['action'] == 'add') {
        $produkBaru = new ProdukElektronik($kode, $nama, $jenis, $merek, $gambar, $berat);
        $_SESSION['daftar_produk'][] = $produkBaru;
    } elseif ($_POST['action'] == 'update') {
        foreach ($_SESSION['daftar_produk'] as $produk) {
            if ($produk->getKode() == $kode) {
                $produk->setNamaBarang($nama);
                $produk->setJenisBarang($jenis);
                $produk->setMerek($merek);
                $produk->setGambar($gambar);
                $produk->setBerat($berat);
                break;
            }
        }
    }
    header("Location: index.php");
    exit();
}

// Logika untuk menyiapkan form edit
$produk_edit = null;
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['kode'])) {
    foreach ($_SESSION['daftar_produk'] as $produk) {
        if ($produk->getKode() == $_GET['kode']) {
            $produk_edit = $produk;
            break;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Toko Elektronik</title>
    <style>
        :root {
            --primary-color: #416ca3ff;
            --secondary-color: #9a9ca1ff;
            --background-color: #295e87ff;
            --surface-color: #adb9c4ff;
            --font-color: #34495e;
            --border-color: #bdc3c7;
            --success-color: #4c5199ff;
            --danger-color: #a53225ff;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background-color: var(--background-color);
            color: var(--font-color);
        }
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 30px;
            background-color: var(--surface-color);
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 1.5em;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2em;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }
        thead th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
        }
        tbody tr:hover {
            background-color: #f5f5f5;
        }
        .form-container {
            padding: 30px;
            background-color: #fdfdfd;
            border-radius: 8px;
            border: 1px solid var(--border-color);
        }
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        .full-width {
            grid-column: 1 / -1;
        }
        label {
            margin-bottom: 8px;
            font-weight: 600;
        }
        input[type=text], input[type=number] {
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 5px;
            font-size: 1em;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        input[type=text]:focus, input[type=number]:focus {
            outline: none;
            border-color: var(--secondary-color);
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }
        button {
            background-color: var(--success-color);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            font-weight: 600;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #27ae60;
        }
        .btn-update {
            background-color: var(--secondary-color);
        }
        .btn-update:hover {
            background-color: #2980b9;
        }
        a { color: var(--secondary-color); text-decoration: none; font-weight: 600; }
        a:hover { text-decoration: underline; }
        .delete-link { color: var(--danger-color); }
        .action-links a { margin-right: 15px; }
        .form-actions { margin-top: 20px; }
        .edit-form-title { color: var(--secondary-color); }
    </style>
</head>
<body>

    <div class="container">
        <h1>Dashboard Produk Elektronik</h1>

        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Jenis</th>
                    <th>Merek</th>
                    <th>Gambar</th>
                    <th>Berat (kg)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($_SESSION['daftar_produk'])): ?>
                    <tr><td colspan="7" style="text-align: center; padding: 20px;">Belum ada data produk. Silakan tambahkan di bawah.</td></tr>
                <?php else: ?>
                    <?php foreach ($_SESSION['daftar_produk'] as $produk): ?>
                    <tr>
                        <td><?= htmlspecialchars($produk->getKode()) ?></td>
                        <td><?= htmlspecialchars($produk->getNamaBarang()) ?></td>
                        <td><?= htmlspecialchars($produk->getJenisBarang()) ?></td>
                        <td><?= htmlspecialchars($produk->getMerek()) ?></td>
                        <td>
                            <img src="<?= htmlspecialchars($produk->getGambar()) ?>" alt="<?= htmlspecialchars($produk->getNamaBarang()) ?>" width="80" style="border-radius: 4px;">
                        </td>
                        <td><?= htmlspecialchars($produk->getBerat()) ?></td>
                        <td class="action-links">
                            <a href="index.php?action=edit&kode=<?= urlencode($produk->getKode()) ?>">Ubah</a>
                            <a href="index.php?action=delete&kode=<?= urlencode($produk->getKode()) ?>" class="delete-link" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="form-container">
            <h2 class="<?= $produk_edit ? 'edit-form-title' : '' ?>"><?= $produk_edit ? '📝 Ubah Data Produk' : '➕ Tambah Produk Baru' ?></h2>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="<?= $produk_edit ? 'update' : 'add' ?>">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="kode">Kode:</label>
                        <input type="text" id="kode" name="kode" value="<?= $produk_edit ? htmlspecialchars($produk_edit->getKode()) : '' ?>" <?= $produk_edit ? 'readonly' : '' ?> required>
                    </div>
                    <div class="form-group">
                        <label for="merek">Merek:</label>
                        <input type="text" id="merek" name="merek" value="<?= $produk_edit ? htmlspecialchars($produk_edit->getMerek()) : '' ?>" required>
                    </div>
                    <div class="form-group full-width">
                        <label for="namaBarang">Nama Barang:</label>
                        <input type="text" id="namaBarang" name="namaBarang" value="<?= $produk_edit ? htmlspecialchars($produk_edit->getNamaBarang()) : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jenisBarang">Jenis Barang:</label>
                        <input type="text" id="jenisBarang" name="jenisBarang" value="<?= $produk_edit ? htmlspecialchars($produk_edit->getJenisBarang()) : '' ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat (kg):</label>
                        <input type="number" step="0.1" id="berat" name="berat" value="<?= $produk_edit ? htmlspecialchars($produk_edit->getBerat()) : '' ?>" required>
                    </div>
                    <div class="form-group full-width">
                        <label for="gambar">Path Gambar:</label>
                        <input type="text" id="gambar" name="gambar" value="<?= $produk_edit ? htmlspecialchars($produk_edit->getGambar()) : '' ?>" placeholder="Contoh: images/nama_produk.jpg" required>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="<?= $produk_edit ? 'btn-update' : '' ?>"><?= $produk_edit ? 'Simpan Perubahan' : 'Tambah Produk' ?></button>
                    <?php if ($produk_edit): ?>
                        <a href="index.php" style="margin-left: 15px;">Batal</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>

</body>
</html>