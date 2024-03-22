<?php
    class donhang{
      function  getDonHangAll(){
        $db = new connect();
        $select="SELECT a.mahoadon, a.idUser, a.masp, a.idsize, a.soluong, a.dongia, a.thanhtien, a.idthanhtoan, a.ngay, a.update_at, a.ghichu, a.trangthai,
        b.masp AS sanpham_masp, b.tensp AS sanpham_tensp,
        c.idsize AS sizesp_idsize, c.tensize AS sizesp_tensize,
        d.idthanhtoan AS pttt_idthanhtoan, d.tenthanhtoan AS pttt_tenthanhtoan,
        e.idUser AS user_idUser, e.username AS user_username
        FROM hoadon a
        JOIN sanpham b ON a.masp = b.masp
        JOIN sizesp c ON a.idsize = c.idsize
        JOIN pttt d ON a.idthanhtoan = d.idthanhtoan
        JOIN user e ON a.idUser = e.idUser;";
        $result=$db->getList($select);
        return $result;
        }
    }
?>