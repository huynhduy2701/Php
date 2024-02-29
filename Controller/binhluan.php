
<?php
include_once './Model/binhluan.php';
$bl= new binhluan();
if (isset($_SESSION['idUser'])) {
    # code...

    if (isset($_POST['submit_binhluan'])) {
        # code...

        $name=$_POST['name'];
        $idsp=$_POST['idsp'];
        $iduser=$_SESSION['idUser'];
        $noidung=$_POST['noidung'];
        $thembl=$bl->thembl($name,$iduser,$idsp,$noidung);
        echo '<script>alert("Đăng Nhập Thành Công")</script>';
        echo '<meta http-equiv="refresh" content="0;url=./index.php" />';
    }
  
    
}
?>