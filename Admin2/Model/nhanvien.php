<?php
    class nhanvien{
        //phương thức kiểm tra xem thông tin có hay không
        function getAdmin($user,$pass){
            $db= new connect();
            $select="select username,matkhau from nhanvien where username ='$user' and matkhau='$pass'";
            $result=$db->getList($select);//bảng
            $set=$result->fetch();//fetch thăng vào bảng nó thành artay
            return $set;
        }
    }
?>