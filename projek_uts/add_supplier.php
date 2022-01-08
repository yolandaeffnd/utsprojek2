<?php 
include('layout/header.php');
include('layout/sidebar.php');
include('supplier.php');
$sup = new Supplier();
if(isset($_POST['submit'])){
    $nama_supplier = $_POST['nama_supplier'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $add_status = $sup->add_data($nama_supplier, $notlp, $email, $alamat);
    if($add_status){
    header('Location: index3.php');
    }
}
?>
<html>
    <head>
        <title>Supplier</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Tambah Data Supplier</h3>
            </div>
            <div class="card-body">
            <form method="POST" action="">
                <div class="form-group row">
                    <label for="nama_siswa" class="col-sm-2 col-form-label">Nama Supplier</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_supplier" class="form-control" id="nama_supplier">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                    <input type="number" name="notelp" class="form-control" id="notelp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control" id="alamat">
                    </div>
                </div>
            
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <input type="submit" name="submit" class="btn btn-primary" value="submit">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    </body>
</html>