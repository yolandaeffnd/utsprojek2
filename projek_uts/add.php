<?php 
include('layout/header.php');
include('layout/sidebar.php');
include('library.php');
include('jenis.php');
include('supplier.php');
$lib = new Library();
$jes = new Jenis();
$sup = new Supplier();
$data_jenis = $jes->show();
$data_supplier = $sup->show();

if(isset($_POST['submit'])){
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $satuan = $_POST['satuan'];
    $id_jenis = $_POST['id_jenis'];
    $id_supplier = $_POST['id_supplier'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $add_status = $lib->add_data($kode_barang,$nama_barang,$satuan,$id_jenis,$id_supplier,$harga,$stok);
    if($add_status){
    header('Location: index2.php');
    }
}
?>
<html>
    <head>
        <title>Barang</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Tambah Data Barang</h3>
            </div>
            <div class="card-body">
            <form method="POST" action="">
                <div class="form-group row">
                    <label for="nama_siswa" class="col-sm-2 col-form-label">Kode Barang</label>
                    <div class="col-sm-10">
                    <input type="text" name="kode_barang" class="form-control" id="kode_barang">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_barang" class="form-control" id="nama_barang">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Satuan</label>
                    <div class="col-sm-10">
                    <input type="text" name="satuan" class="form-control" id="satuan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Jenis</label>
                    <div class="col-sm-10">
                    <!-- <input type="text" name="id_jenis" class="form-control" id="id_jenis"> -->
                    <select name="id_jenis">
                    <option value="">--Jenis Barang--</option>
                <?php
                        
                    foreach($data_jenis as $row){
                        echo"<option value=".$row['id'].">".$row['nama_jenis']."</option>";
                        
                    }
                    ?>
                    </select>
                    </div>
                </div>
               
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Supplier</label>
                    <div class="col-sm-10">
                    <!-- <input type="text" name="id_supplier" class="form-control" id="id_supplier"> -->
                    <select name="id_supplier">
                    <option value="">--Supplier--</option>
                <?php
                        
                    foreach($data_supplier as $row){
                        echo"<option value=".$row['id'].">".$row['nama_supplier']."</option>";
                        
                    }
                    ?>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                    <input type="text" name="harga" class="form-control" id="harga">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-10">
                    <input type="text" name="stok" class="form-control" id="stok">
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