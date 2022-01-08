<?php
class Library
{
    public function __construct()
    {
        $host = "localhost";
        $dbname = "db_gudang";
        $username = "root";
        $password = "";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }
    
    public function add_data($kode_barang, $nama_barang, $satuan, $id_jenis, $id_supplier, $harga, $stok)
    {
        $data = $this->db->prepare('INSERT INTO barang (kode_barang,nama_barang,satuan,id_jenis,id_supplier,harga,stok) VALUES (?, ?, ?, ?, ?, ?, ?)');
        
        $data->bindParam(1, $kode_barang);
        $data->bindParam(2, $nama_barang);
        $data->bindParam(3, $satuan);
        $data->bindParam(4, $id_jenis);
        $data->bindParam(5, $id_supplier);
        $data->bindParam(6, $harga);
        $data->bindParam(7, $stok);
        
        

        $data->execute();
        return $data->rowCount();
    }
    public function show()
    {
        $query = $this->db->prepare("SELECT * FROM barang");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function get_by_id($id){
        $query = $this->db->prepare("SELECT * FROM barang where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    }

    public function update($id,$kode_barang, $nama_barang, $satuan, $id_jenis, $id_supplier, $harga, $stok){
        $query = $this->db->prepare('UPDATE barang set kode_barang=?,nama_barang=?,satuan=?,id_jenis=?,id_supplier=?,harga=?,stok=? where id=?');
        
        $query->bindParam(1, $kode_barang);
        $query->bindParam(2, $nama_barang);
        $query->bindParam(3, $satuan);
        $query->bindParam(4, $id_jenis);
        $query->bindParam(5, $id_supplier);
        $query->bindParam(6, $harga);
        $query->bindParam(7, $stok);
        $query->bindParam(8, $id);

        $query->execute();
        return $query->rowCount();
    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM barang where id=?");

        $query->bindParam(1, $id);

        $query->execute();
        return $query->rowCount();
    }

}
?>