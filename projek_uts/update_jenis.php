<?php 
include('layout/header.php');
include('layout/sidebar.php');
include('jenis.php');
$jen = new Jenis();
if(isset($_GET['id'])){
  $id = $_GET['id']; 
  $data_jenis = $jen->get_by_id($id);
}
else
{
  header('Location: index4.php');
}

if(isset($_POST['tombol_update'])){
    $id = $_POST['id'];
    $nama_jenis = $_POST['nama_jenis'];
    $keterangan = $_POST['keterangan'];
  $status_update = $jen->update($id,$nama_jenis, $keterangan);
  if($status_update)
  {
      header('Location:index4.php');
  }
}
?>
<html>
    <head>
        <title>jenis</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Edit Data Jenis</h3>
            </div>
            <div class="card-body">
            <form method="POST" action="">
            <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $data_jenis['id']; ?>"> 
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">Nama Jenis</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_jenis" class="form-control" id="nama_jenis" value="<?php echo $data_jenis['nama_jenis']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-2 col-form-label">keterangan</label>
                    <div class="col-sm-10">
                    <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?php echo $data_jenis['keterangan']; ?>">
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