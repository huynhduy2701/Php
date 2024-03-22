<?php
    class thongtin{
        function getThongTin($id){
            $db= new db();
            $select="SELECT a.tensp, b.tensize, c.soluong, c.dongia, 
            c.idsize, c.idthanhtoan, c.masp, c.idUser, c.thanhtien, d.tenthanhtoan,c.ghichu,c.trangthai
            FROM hoadon c JOIN sanpham a ON a.masp = c.masp JOIN sizesp b 
            ON b.idsize = c.idsize JOIN pttt d ON d.idthanhtoan = c.idthanhtoan 
            WHERE c.idUser = $id;";
            $result=$db->getList($select);
            return $result;
        }
    }
?>