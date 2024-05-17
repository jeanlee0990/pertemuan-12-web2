<?php
$koneksi = mysqli_connect("localhost", "root", "", "dbBerita");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

$idKategori = $_GET['id'];

$query = "DELETE FROM tblKategori WHERE idKategori='$idKategori'";
if (mysqli_query($koneksi, $query)) {
    echo "Data kategori berhasil dihapus.";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
