<?php
    class thanhvien{
      function  getThanhvienAll(){
            $db= new connect();
            $selec= "SELECT * FROM `user`";
            $result= $db->getList($selec);
            return $result;
        }
        function deletThanhVien($id){
            $db = new connect();
            $query = "DELETE FROM `user` WHERE `idUser` = $id";
            $result = $db->exec($query);
            return $result; // Trả về kết quả sau khi thực hiện truy vấn
        }
    }
?>