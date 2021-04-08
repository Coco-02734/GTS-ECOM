<?php
include "koneksi.php";
if (isset($_POST['lanjut'])) {
    //manggil atau ambil data dikirim di form
    $nama = $_POST['nama'];
    $nama_produk = $_POST['nama_produk'];
    $jumlah = $_POST['jumlah'];
    $totalbayar = $_POST['harga'] * $_POST['jumlah'];
    $alamat = $_POST['alamat'];
    $notlpn = $_POST['notlpn'];
    $keterangan = $_POST['keterangan'];
    $kurir = $_POST['kurir'];
    $sql = "INSERT INTO tb_transaksi VALUE('','$nama','$nama_produk','$jumlah','$totalbayar','$alamat','$notlpn','$keterangan','$kurir',current_timestamp(),'0')";
    $query = mysqli_query($koneksi, $sql);

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Halaman Order | WarungKu</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Ringkasan Pemesanan</h3>
                    <hr>
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                Nama Pemesan : <?= $_POST['nama']; ?>
                            </li>
                            <li class="list-group-item">
                                Pesanan : <?= $_POST['nama_produk']; ?>
                            </li>
                            <li class="list-group-item">
                                Harga Satuan : Rp <?= $_POST['harga']; ?>
                            </li>
                            <li class="list-group-item">
                                Total Harga : Rp <?= $_POST['harga'] * $_POST['jumlah']; ?>
                            </li>
                            <li class="list-group-item">
                                Nomor Tlpn :<?= $_POST['notlpn']; ?>
                            </li>
                            <li class="list-group-item">
                                Alamat : <?= $_POST['alamat']; ?>
                            </li>
                            <li class="list-group-item">
                                Kurir : <?= $_POST['kurir']; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <!-- 
                &text perintah ini untuk menambahkan teks pada link WhatsApp web, bisa Anda sesuaikan sesuai dengan kebutuhan.
                %20 perintah untuk menambahkan spasi dalam teks.
                %0A perintah untuk menambahkan ganti baris/enter pada teks.
             -->
                <a href="https://api.whatsapp.com/send?phone=0834000003&text=Kak%20Mau%20Konfirmasi%20Pesanan%20Nama:%20<?= $_POST['nama']; ?>%20Total%20Bayar%20<?= $totalbayar; ?> " class="btn btn-primary btn-lg btn-block">Konfirmasi Admin</a>
            </div>
        </div>
        <script src="assets/css/jquery-3.5.1.min.js"></script>
        <script src="assets/css/bootstrap.min.js"></script>
    </body>

    </html>
<?php } else {
    echo "error";
} ?>