<?php 
include('layout/header.php');
include('layout/sidebar.php');
include('jenis.php');
$jen = new Jenis();
$data_jenis = $jen->show();

if(isset($_GET['hapus_jenis']))
{
    $id = $_GET['hapus_jenis'];
    $status_hapus = $sup->delete($id);
    if($status_hapus)
    {
        header('Location: index4.php');
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
        <title>Data Jenis</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Data Jenis</h3>
            </div>
            <div class="card-body">
                <a href="add_jenis.php" class="btn btn-success">Tambah</a>
                <hr/>
                <table class="table table-bordered" width="60%">
                <tr>
      <th scope="col">#</th>
      <th scope="col">Kode Supplier</th>
      <th scope="col">Nama Jenis</th>
      <th scope="col">Keterangan</th>
      
    </tr>
                    <?php 
                    $no = 1;
                    foreach($data_jenis as $row)
                    {
                      echo"<tr>
                      <td>".$no."</td>
                      <td>".$row['id']."</td>
                      <td>".$row['nama_jenis']."</td>
                      <td>".$row['keterangan']."</td>
                     
                      <td><a class='btn btn-info' href='update_jenis.php?id=".$row['id']."'>Update</a>
                        <a class='btn btn-danger' href='index4.php?hapus_barang=".$row['id']."' onclick=\"return checkDelete()\">Hapus</a></td>
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