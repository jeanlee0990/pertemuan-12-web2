<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input dan Daftar Kategori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Form Input Kategori</h2>
        <form action="simpan_kategori.php" method="POST">
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori:</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <h2 class="mt-5">Daftar Kategori</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $koneksi = mysqli_connect("localhost", "root", "", "dbBerita");

                if (mysqli_connect_errno()) {
                    echo "Koneksi database gagal: " . mysqli_connect_error();
                    exit();
                }

                $nomorIndeks = 1;

                $query = "SELECT * FROM tblKategori";
                $result = mysqli_query($koneksi, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>".$nomorIndeks."</td>
                            <td>".$row['nama_kategori']."</td>
                            <td>
                                <a href='edit_kategori.php?id=".$row['idKategori']."' class='btn btn-info btn-sm'>Edit</a>
                                <a href='hapus_kategori.php?id=".$row['idKategori']."' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                        </tr>";
                    $nomorIndeks++;
                }

                mysqli_close($koneksi);
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
