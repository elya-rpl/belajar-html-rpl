<?php
function select($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


//fungsi menambahkan (create)
function create_barang($POST)
{
    global $db;

    $nama = $POST['nama'];
    $jumlah = $POST['jumlah'];
    $harga = $POST['harga'];

    //query tambah data
    $query = "INSERT INTO barang VALUES(null, '$nama', '$jumlah', '$harga', CURRENT_TIMESTAMP())";

    mysqli_query($db,$query);

    return mysqli_affected_rows($db);
    }
// fungsi mengubah data barang
function update_barang($POST)
{
    global $db;

    $id_barang = $POST['id_barang'];
    $nama      = $POST['nama'];
    $jumlah    = $POST['jumlah'];
    $harga     = $POST['harga'];

    // query ubah data (pastikan tanpa tanda petik di nama tabel barang)
    $query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
// fungsi menghapus data barang
function delete_barang($id_barang)
{
    global $db;

    // query hapus data barang
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}