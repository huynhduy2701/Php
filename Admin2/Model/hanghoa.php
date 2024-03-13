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
      
    }
?>