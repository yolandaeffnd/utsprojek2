<?php 
include('layout/header.php');
include('layout/sidebar.php');
include('supplier.php');
$sup = new Supplier();
$data_supplier = $sup->show();

if(isset($_GET['hapus_supplier']))
{
    $id = $_GET['hapus_supplier'];
    $status_hapus = $sup->delete($id);
    if($status_hapus)
    {
        header('Location: index3.php');
    }
}
?>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Yakin menghapus data?');
}
</script>
<html>
    <head>
        <title>Data Supplier</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Data Supplier</h3>
            </div>
            <div class="card-body">
                <a href="add_supplier.php" class="btn btn-success">Tambah</a>
                <hr/>
                <table class="table table-bordered" width="60%">
                <tr>
      <th scope="col">#</th>
      <th scope="col">Kode Supplier</th>
      <th scope="col">Nama Supplier</th>
      <th scope="col">Nomor Telepon</th>
      <th scope="col">Email</th>
      <th scope="col">Alamat</th>
      
    </tr>
                    <?php 
                    $no = 1;
                    foreach($data_supplier as $row)
                    {
                      echo"<tr>
                      <td>".$no."</td>
                      <td>".$row['id']."</td>
                      <td>".$row['nama_supplier']."</td>
                      <td>".$row['notelp']."</td>
                      <td>".$row['email']."</td>
                      <td>".$row['alamat']."</td>
                     
                      <td><a class='btn btn-info' href='update_supplier.php?id=".$row['id']."'>Update</a>
                        <a class='btn btn-danger' href='index3.php?hapus_barang=".$row['id']."' onclick=\"return checkDelete()\">Hapus</a></td>
                    </tr>";
                    $no++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    </body>
</html>