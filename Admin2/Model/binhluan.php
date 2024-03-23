<?php
    class binhluan{
     function getBinhLuanAll(){
            $db= new connect();
            $select="SELECT a.id, a.idUser ,a.noidung,a.masp ,b.username,c.tensp FROM binhluan a,user b,sanpham c WHERE a.idUser=b.idUser AND a.masp=c.masp ORDER BY a.idUser";
            $result=$db->getList($select);
           return $result;
        }
        public function delCMT($id) {
            $db = new connect();
            $query = "DELETE FROM `binhluan` WHERE `id` = $id";
            $result = $db->exec($query);
            return $result; // Trả về kết quả sau khi thực hiện truy vấn
        }
        public function getCMT($id) {
            $db= new connect();
            $select="SELECT a.id,a.idUser ,a.noidung,a.masp ,b.tensp,c.username FROM binhluan a ,sanpham b ,user c WHERE a.id=$id and a.idUser=c.idUser and a.masp=b.masp";
            $result=$db->getList($select);
            return $result;
        }
        public function UpdateBinhLuan($id,$noidung){
            $db= new connect();
            $select="UPDATE `binhluan` SET `noidung` = '$noidung' WHERE `binhluan`.`id` = $id";
            $result=$db->exec($select);
            return $result;
        }
    }
?>