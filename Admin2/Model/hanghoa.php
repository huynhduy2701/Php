<?php
    class hanghoa{
        function getHangHoa(){
            $db= new connect();
            $select="select * from sanpham";
            $result=$db->getList($select);
            return $result;
        }
        function getInsertSanPham($tensp,$maloai,$mota,$ngaylap,$hinh){
            $db= new connect();
            $query="insert into sanpham (masp,tensp,idMenu,mota,ngaylap,hinh)
                values (NULL,'$tensp',$maloai,'$mota','$ngaylap','$hinh')
            ";
            $db->exec($query);
        }
        function getHangHoaId($id){
            $db= new connect();
            $select="select * from sanpham where masp='$id'";
            $result=$db->getInstance($select);
            return $result;
        }

        //phương thưc update

        function updatehangHoa($masp,$tensp,$maloai,$mota,$ngaylap,$hinh){
            $db=new connect();
            $query="update sanpham set tensp='$tensp',idMenu=$maloai,mota='$mota',ngaylap='$ngaylap',hinh='$hinh' where masp='$masp'";
            $db->exec($query);
        }

        function getDeleteSanPham($id){
            $db= new connect();
            $query="delete from  sanpham where masp='$id'";
            $db->exec($query);
        }
        //phương thức tính tổng số lượng mua từng món hàng
         function getThongKe(){
            $db = new connect();
            $select= "SELECT a.masp ,b.tensp,sum(a.soluong) as soluong FROM hoadon a ,sanpham b WHERE a.masp=b.masp GROUP by a.masp,b.tensp;";
            $result=$db->getList($select);
            return $result;
         }
         function getThongKeTheoNgayNam($thang,$nam){
            $db = new connect();
            $select= "SELECT a.masp,a.ngay ,b.tensp,sum(a.soluong) as soluong FROM hoadon a ,sanpham b WHERE a.masp=b.masp AND a.ngay LIKE '$nam-$thang%' GROUP by a.masp,b.tensp";
            $result=$db->getList($select);
            return $result;
         }
        // function getThongKeTheoNgayNam($thang, $nam){
        //     $db = new connect();
        //     $select = "SELECT a.masp, a.ngay, b.tensp, SUM(a.soluong) AS soluong FROM hoadon a, sanpham b WHERE a.masp=b.masp AND a.ngay LIKE '$nam-$thang%' GROUP BY a.masp, b.tensp;";
        //     $result = $db->getList($select);
        //     return $result;
        // }
         function getThongKeNN(){
            $db = new connect();
            $select= "SELECT a.masp, b.tensp, MAX(a.soluong) as soluong 
            FROM hoadon a
            INNER JOIN sanpham b ON a.masp = b.masp 
            GROUP BY a.masp, b.tensp 
            ORDER BY soluong DESC 
            LIMIT 1;";
            $result=$db->getList($select);
            return $result;
         }
         function getThongKeIN(){
            $db = new connect();
            $select= "SELECT a.masp, b.tensp, MIN(a.soluong) as soluong 
            FROM hoadon a
            INNER JOIN sanpham b ON a.masp = b.masp 
            GROUP BY a.masp, b.tensp 
            ORDER BY soluong DESC 
           ;";
            $result=$db->getList($select);
            return $result;
         }
      
    }
?>