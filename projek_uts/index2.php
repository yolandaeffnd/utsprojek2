<?php 
include('layout/header.php');
include('layout/sidebar.php');
include('library.php');
$lib = new Library();
$data_barang = $lib->show();

if(isset($_GET['hapus_barang']))
{
    $id = $_GET['hapus_barang'];
    $status_hapus = $lib->delete($id);
    if($status_hapus)
    {
        header('Location: index2.php');
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
        <title>Data Barang</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Data Barang</h3>
            </div>
            <div class="card-body">
                <a href="add.php" class="btn btn-success">Tambah</a>
                <hr/>
                <table class="table table-bordered" width="60%">
                <tr>
      <th scope="col">#</th>
      <th scope="col">Kode Barang</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Satuan</th>
      <th scope="col">Jenis</th>
      <th scope="col">Supplier</th>
      <th scope="col">Harga</th>
      <th scope="col">Stok</th>
      <th scope="col">Aksi</th>
      
      
      
      
    </tr>
                    <?php 
                    $no = 1;
                    foreach($data_barang as $row)
                    {
                      echo"<tr>
                      <td>".$no."</td>
                      <td>".$row['kode_barang']."</td>
                      <td>".$row['nama_barang']."</td>
                      <td>".$row['satuan']."</td>
                      <td>".$row['id_jenis']."</td>
                      <td>".$row['id_supplier']."</td>
                      <td>".$row['harga']."</td>
                      <td>".$row['stok']."</td>
                          
                      <td><a class='btn btn-info' href='update_barang.php?id=".$row['id']."'>Update</a>
                        <a class='btn btn-danger' href='index2.php?hapus_barang=".$row['id']."' onclick=\"return checkDelete()\">Hapus</a></td>
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