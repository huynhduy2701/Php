<?php
     class user 
    {
        /// pương thức kiểm tra user và email có tồn tại chưa ?
        function checkUser($user,$email){
            $db= new db();
            $select="SELECT a.username,a.email from user a WHERE a.username='$user' or a.email='$email'";
            $result=$db->getList($select);
            return $result;
        }
        //phương thứ inser vào database
        function insertUser($hokh,$tenkh,$email,$diachi,$sodt,$tenUser,$pass){
            $db= new db();
            $query="INSERT INTO user (idUser,TenKh, HoKh, email, diachi, sodt, username, matkhau) 
            VALUES (NULL, '$hokh', '$tenkh', '$email', '$diachi ', '$sodt', '$tenUser', '$pass')";
            $result=$db->exec( $query);
            return $result;
        }
        //thực hiện hiển thị thông tin ra
        function loginUser($user,$pass){
            $db=new db();
            $select="SELECT a.idUser ,a.TenKh,a.HoKh,a.email,a.diachi,a.sodt,a.username	,a.matkhau FROM user a WHERE a.username='$user' AND a.matkhau='$pass'";
            // echo $select;
            $result= $db->getList($select);
            // echo $result;
            return $result;
        }
        // kiểm tra email có tồn tại hay không
        function checkEmail($email)  {
            $db=new db();
            $select="SELECT * FROM user a WHERE a.email='$email'";
            // echo $select;
            $result= $db->getList($select);
            return $result;
        }
        //phương thức update pass khi biết email
        function updatePass($email,$passnew)  {
            $db= new db();
            $query="UPDATE user SET matkhau='$passnew' WHERE email ='$email'";
            echo $query;
            $result=$db->exec($query);
            return $result;
            // var_dump($result); 
        }
        // lấy pass trong database
        function getPassOld($email)
        {
            $db= new db();
            $select="SELECT matkhau FROM user where email='$email'";
            //echo $select;
            $result=$db->getInstance($select);
            return $result;
        }
    }
    
?>