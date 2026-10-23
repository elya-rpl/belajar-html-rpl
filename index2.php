<?php

include 'database.php';

function select ($query)
{
    global  $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $result;
}

$data_barang = select("SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div><nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="logo smk/logo.png" height="40"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav></div>
    <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello world!</title>
  </head>
  <body>
    <div class="container mt-5">
        <h2 style="text-align: center;">Data Barang</h2>
        <hr>
        <a href="tambah-barang.php" class="btn btn-primary mb-1">Tambah</a>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Jumlah Barang</th>
      <th scope="col">Harga Barang</th>
      <th scope="col">tanggal</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; ?>
    <?php foreach ($data_barang as $barang) : ?>
    <tr>

      <td><?= $no++; ?></td>
      <td><?= $barang['nama']; ?></td>
      <td><?= $barang['jumlah']; ?></td>
      <td>Rp. <?= number_format($barang['harga'], 0, ',', '.'); ?></td>
      <td><?= date("d/m/Y | H:i:s", strtotime($barang['tanggal'])); ?></td>
      <td width="15%" class="text-center">
           <a href="ubah-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-success">Ubah</a>
           <a href="hapus-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn
           btn-danger" onclick="return confirm('Yakin Data Barang Akan Dihapus.');">Hapus</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
</div>

<?php include 'layout/footer.php'; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   
  </body>
</html>
</body>
</html>