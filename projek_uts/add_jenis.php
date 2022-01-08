<?php 
include('layout/header.php');
include('layout/sidebar.php');
include('jenis.php');
$jen = new Jenis();
if(isset($_POST['submit'])){
    $nama_jenis = $_POST['nama_jenis'];
    $keterangan = $_POST['keterangan'];
    
    $add_status = $jen->add_data($nama_jenis,$keterangan);
    if($add_status){
    header('Location: index4.php');
    }
}
?>
<html>e
    <head>
        <title>Jenis</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Tambah Data Jenis</h3>
            </div>
            <div class="card-body">
            <form method="POST" action="">
                <div class="form-group row">
                    <label for="nama_siswa" class="col-sm-2 col-form-label">Nama Jenis</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_jenis" class="form-control" id="nama_jenis">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                    <input type="text" name="keterangan" class="form-control" id="keterangan">
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