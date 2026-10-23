<?php

include_once 'config/app.php';
include_once 'config/controller.php';
include 'layout/header.php';

// Ambil id_barang dari URL
$id_barang = isset($_GET['id_barang']) ? (int)$_GET['id_barang'] : 0;

// Ambil data barang
$data = select("SELECT * FROM barang WHERE id_barang = $id_barang");

// Cek apakah data ada
if (!empty($data)) {
    $barang = $data[0];
} else {
    echo "<script>
            alert('Data barang tidak ditemukan!');
            document.location.href = 'index2.php';
          </script>";
    exit;
}

// Proses saat tombol Ubah diklik
if (isset($_POST['ubah'])) {
    if (update_barang($_POST) > 0) {
        echo "<script>
                alert('Data Barang Berhasil Diubah');
                document.location.href = 'index2.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Barang Gagal Diubah');
                document.location.href = 'index2.php';
              </script>";
    }
}

?>

<div class="container mt-5">
    <h1>Ubah barang</h1>
    <hr>

    <form action="" method="post">
        <!-- Input ID Sembunyi -->
        <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang['nama']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $barang['jumlah']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga Barang</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= $barang['harga']; ?>" required>
        </div>

        <button type="submit" name="ubah" class="btn btn-primary float-end">Ubah</button>
    </form>
</div>

<?php include 'layout/footer.php'; ?>