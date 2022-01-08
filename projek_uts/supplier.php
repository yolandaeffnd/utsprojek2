<?php
class Supplier
{
    public function __construct()
    {
        $host = "localhost";
        $dbname = "db_gudang";
        $username = "root";
        $password = "";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }
    
    public function add_data($nama_supplier, $notelp, $email, $alamat)
    {
        $data = $this->db->prepare('INSERT INTO supplier (id,nama_supplier,notelp,email,alamat) VALUES (?, ?, ?, ?)');
        
       
        $data->bindParam(1, $nama_supplier);
        $data->bindParam(2, $notelp);
        $data->bindParam(3, $email);
        $data->bindParam(4, $alamat);
        

        $data->execute();
        return $data->rowCount();
    }
    public function show()
    {
        $query = $this->db->prepare("SELECT * FROM supplier");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function get_by_id($id){
        $query = $this->db->prepare("SELECT * FROM supplier where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    }

    public function update($id, $nama_supplier, $notelp, $email, $alamat){
        $query = $this->db->prepare('UPDATE supplier set nama_supplier=?,notelp=?,email=?,alamat=? where id=?');
        
        
        $query->bindParam(1, $nama_supplier);
        $query->bindParam(2, $notelp);
        $query->bindParam(3, $email);
        $query->bindParam(4, $alamat);
        $query->bindParam(5, $id);

        $query->execute();
        return $query->rowCount();
    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM supplier where id=?");

        $query->bindParam(1, $id);

        $query->execute();
        return $query->rowCount();
    }

}
?>