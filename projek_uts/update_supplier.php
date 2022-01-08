<?php 
include('layout/header.php');
include('layout/sidebar.php');
include('supplier.php');
$sup = new Supplier();
if(isset($_GET['id'])){
  $id = $_GET['id']; 
  $data_supplier = $sup->get_by_id($id);
}
else
{
  header('Location: index3.php');
}

if(isset($_POST['tombol_update'])){
    $id = $_POST['id'];
    $nama_supplier = $_POST['nama_supplier'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
  $status_update = $sup->update($id,$nama_supplier, $notelp, $email, $alamat);
  if($status_update)
  {
      header('Location:index3.php');
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
                <h3>Edit Data Supplier</h3>
            </div>
            <div class="card-body">
            <form method="POST" action="">
            <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $data_supplier['id']; ?>"> 
                <div class="form-group row">
                    <label for="nama_siswa" class="col-sm-2 col-form-label">Nama Supplier</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_supplier" class="form-control" id="nama_supplier" value="<?php echo $data_supplier['nama_supplier']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                    <input type="text" name="notelp" class="form-control" id="notelp" value="<?php echo $data_supplier['notelp']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="email" value="<?php echo $data_supplier['email']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $data_supplier['alamat']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <input type="submit" name="tombol_update" class="btn btn-primary" value="Update">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    </body>
</html>