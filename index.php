<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WarungKu</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">WarungKu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Katagori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Makanan</a>
                        <a class="dropdown-item" href="#">Minuman</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Kontak</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Cari Menu" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-3">
            <div class="col pb-5">
                <h2 class="text-center">All Menu WarungKu</h2>
            </div>
        </div>
        <div class="row mt-3">
            <?php
            include "koneksi.php";
            $sql = "SELECT * FROM tb_produk";
            $query = mysqli_query($koneksi, $sql);
            while ($m = mysqli_fetch_array($query)) {

            ?>
                <!-- card mulai -->
                <div class="col-md-4 pb-5">
                    <div class="card">
                        <img src="assets/img/<?php echo $m['gambar'] ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $m['nama_produk'] ?></h5>
                            <span class="card-text">Jml Stok :
                                <span class="badge badge-pill badge-warning"><?php echo $m['stok'] ?></span> </span>
                            <p class="card-text">Rp <?php echo $m['harga'] ?></p>
                            <button type="button" data-toggle="modal" data-target="#idpesan<?php echo $m['id_produk'] ?>" class="btn btn-primary">Beli</button>
                        </div>
                    </div>
                </div>
                <!-- card selesai -->


                <!-- Modal -->
                <div class="modal fade" id="idpesan<?php echo $m['id_produk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Check Out Pesanan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- form order -->
                                <form method="POST" action="order.php">
                                    <!-- bikim input hidden -->
                                    <input type="hidden" class="form-control" name="id_produk" value="<?php echo $m['id_produk'] ?>">

                                    <input type="hidden" class="form-control" name="nama_produk" value="<?php echo $m['nama_produk'] ?>">

                                    <input type="hidden" class="form-control" name="harga" value="<?php echo $m['harga'] ?>">

                                    <div class="form-group">
                                        <h5>
                                            Item : <?php echo $m['nama_produk'] ?>
                                            <br>
                                            <span class="badge badge-secondary">Rp <?php echo $m['harga'] ?></span>
                                        </h5>
                                        <hr>
                                        <label for="nama">Nama Pemesan: </label>
                                        <input type="text" class="form-control" name="nama" id="nama" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah Pesan </label>
                                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="notlpn">Nomor Telp Aktif </label>
                                        <input type="number" class="form-control" id="notlpn" name="notlpn" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan </label>
                                        <input type="text" class="form-control" placeholder="Pedas, Banyak, ..." id="keterangan" name="keterangan">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat Lengkap</label>
                                        <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="kurir">Jasa Pengiriman</label>
                                        <select class="form-control" id="kurir" name="kurir">
                                            <option value="Go-Send">Go-Send</option>
                                            <option value="Grab Express">Grab Express</option>
                                        </select>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="lanjut" class="btn btn-primary">Lanjut Bayar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- selesaimodal -->
            <?php
            } ?>
        </div>

    </div>
    <footer>
        <div class="col text-center">
            <i class="fa fa-copyright" aria-hidden="true">Copyright by Nico F, 2020</i>
        </div>
    </footer>
</body>

<script src="assets/css/jquery-3.5.1.min.js"></script>
<script src="assets/css/bootstrap.min.js"></script>

</html>