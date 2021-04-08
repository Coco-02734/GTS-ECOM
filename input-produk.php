<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Produk | Admin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h4 class="text-center">Kelola Produk</h4>
        <hr>
        <div class="col-lg-6">
            <h5>Input Porduk</h5>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama Produk</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" required>
                </div>
                <div class="custom-file">
                    <label for="gambar">Pilih Gambar</label>
                    <br>
                    <input type="file" id="gambar" name="gambar">
                </div>
                <button type="submit" name="tambah" class="btn btn-primary mt-3">Tambah</button>
            </form>
        </div>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $sql = "SELECT * FROM tb_produk";
                $query = mysqli_query($koneksi, $sql);
                while ($m = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <th><?= $m['nama_produk']; ?></th>
                        <td><?= $m['stok']; ?></td>
                        <td>Rp <?= $m['harga']; ?></td>
                        <td><img src="assets/img/<?= $m['gambar']; ?>" class="img-thumbnail" width="100px"></td>
                        <td><a href="#" class="badge badge-danger">Delete</a></td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
    <?php
    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];
        //cek gambar
        $rand = rand();
        $ektensi = array('png', 'jpg', 'jpeg', 'gif');
        $filename = $_FILES['gambar']['name'];
        $ukuran = $_FILES['gambar']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        //MULAI UPLOAD
        $img = $rand . '_' . $filename;
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'assets/img/' . $img);
        $cek = mysqli_query($koneksi, "INSERT INTO tb_produk VALUES('','$nama','$stok','$harga','$img')");
        if ($cek) {
            header("Location: input-produk.php");
        } else {
            echo "gagal";
        }
    }
    ?>
</body>

</html>