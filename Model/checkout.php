<?php
    class checkout{
   
        function getHoadon($idUser, $masp, $idsize, $soluong, $dongia, $thanhtien, $idthanhtoan) {
            $db = new db();
            $query = "INSERT INTO `hoadon` (`mahoadon`, `idUser`, `masp`, `idsize`, `soluong`, `dongia`, `thanhtien`, `idthanhtoan`) 
                      VALUES (NULL, $idUser, '$masp', '$idsize', $soluong, $dongia, $thanhtien, $idthanhtoan);";
            $result = $db->exec($query);
            return $result;
        }
        function getPTTT(){
            $db= new db();
            $select="select * from pttt";
            $result=$db->getList($select);
            return $result;
        }
        function inserCTHD($mahoadon, $count, $masp) {
            $db = new db();
            $query = "INSERT INTO `cthd` (`mahoadon`, `soluotmua`, `masp`) VALUES ('$mahoadon', '$count', '$masp')";
            $result = $db->exec($query);
            return $result;
        }
    }
?>