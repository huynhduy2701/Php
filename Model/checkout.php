<?php
    class checkout{
   
        function getHoadon($idUser, $masp, $idsize, $soluong, $dongia, $thanhtien, $idthanhtoan,$note) {
            $db = new db();
            $status="Đặt Thành Công";
            $ngayHienTai = date('Y-m-d '); // Lấy ngày hiện tại từ PHP
            $query = "INSERT INTO `hoadon` (`mahoadon`, `idUser`, `masp`, `idsize`, `soluong`, `dongia`, `thanhtien`, `idthanhtoan`,`ngay`,`ghichu`,`trangthai`) 
                      VALUES (NULL, $idUser, '$masp', '$idsize', $soluong, $dongia, $thanhtien, $idthanhtoan,'$ngayHienTai','$note','$status');";
            $result = $db->exec($query);
            return $result;
          
        }
        function getPTTT(){
            $db= new db();
            $select="select * from pttt";
            $result=$db->getList($select);
            return $result;
        }
        
        // function inserCTHD($mahoadon, $count, $masp) {
        //     $db = new db();
        //     // $query = "INSERT INTO `cthd` (`mahoadon`, `soluotmua`, `masp`) VALUES ('$mahoadon', '$count', '$masp')";
        //     $ngayHienTai = date('Y-m-d H:i:s'); // Lấy ngày hiện tại từ PHP
        //     echo $ngayHienTai;
        //     $query = "INSERT INTO `cthd` (`mahoadon`, `soluotmua`, `masp`, `ngay`) VALUES ('$mahoadon', '$count', '$masp', '$ngayHienTai')";
        //     $result = $db->exec($query);
        //     return $result;
        // }

        //// t bị thiê
        // public function insertHD($makh,$tongtien,$giam,$vanchuyen,$phone,$diachi){
        //     $table='hoadon';
        //     $ngaydat = date('Y-m-d H:i:s');
        //     $data = [
        //         "id"=>null,
        //         "makh"=>$makh,
        //         "ngaydat"=>$ngaydat,
        //         "tongtien"=>$tongtien,
        //         "giam"=>$giam,
        //         'vanchuyen'=>$vanchuyen,
        //         "phone"=>$phone,
        //         "diachi"=>$diachi,
        //     ];
        //     return $this->connect->insertData($table, $data);
        // }
    }
?>