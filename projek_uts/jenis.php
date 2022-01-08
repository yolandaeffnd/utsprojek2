<?php
class Jenis
{
    public function __construct()
    {
        $host = "localhost";
        $dbname = "db_gudang";
        $username = "root";
        $password = "";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }
    
    public function add_data($nama_jenis, $keterangan)
    {
        $data = $this->db->prepare('INSERT INTO jenis (nama_jenis,keterangan) VALUES (?, ?)');
        
        
        $data->bindParam(1, $nama_jenis);
        $data->bindParam(2, $keterangan);
        

        $data->execute();
        return $data->rowCount();
    }
    public function show()
    {
        $query = $this->db->prepare("SELECT * FROM jenis");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function get_by_id($id){
        $query = $this->db->prepare("SELECT * FROM jenis where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    }

    public function update($id, $nama_jenis, $keterangan){
        $query = $this->db->prepare('UPDATE jenis set nama_jenis=?,keterangan=? where id=?');
        
        
        $query->bindParam(1, $nama_jenis);
        $query->bindParam(2, $keterangan);
        $query->bindParam(3, $id);

        $query->execute();
        return $query->rowCount();
    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM jenis where id=?");

        $query->bindParam(1, $id);

        $query->execute();
        return $query->rowCount();
    }

}
?>