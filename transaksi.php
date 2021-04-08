<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Transaksi | Admin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h4 class="text-center">Kelola Transaksi</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No Transaksi</th>
                    <th scope="col">Tanggal Pesan</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Pesanan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No tlpn</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col">Kurir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $sql = "SELECT * FROM tb_transaksi";
                $query = mysqli_query($koneksi, $sql);
                while ($m = mysqli_fetch_array($query)) {


                ?>
                    <tr>
                        <th><?= $m['id']; ?></th>
                        <td><?= $m['tgl_pesan']; ?></td>
                        <td><?= $m['nama_user']; ?></td>
                        <td><?= $m['nama_produk']; ?> - <?= $m['jumlah']; ?> </td>
                        <td><?= $m['alamat']; ?></td>
                        <td><?= $m['notlpn']; ?></td>
                        <td><?= $m['keterangan']; ?></td>
                        <td>Rp <?= $m['total_bayar']; ?></td>
                        <td><?= $m['kurir']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>