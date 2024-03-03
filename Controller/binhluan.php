
<?php
include_once './Model/binhluan.php';
$bl= new binhluan();
if (isset($_SESSION['idUser'])) {
    # code...

    if (isset($_POST['submit_binhluan'])) {
        # code...

        $idUser = $_SESSION['idUser'];
        $masp=$_POST['idsp'];
        $noidung=$_POST['noidung'];
        $thembl = $bl->thembl($idUser, $masp, $noidung);
        echo '<script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Bình Luận Thành Công",
            showConfirmButton: false,
            timer: 100000
          });
        </script>';
        echo '<meta http-equiv="refresh" content="0" />';
    }
  
    
}
?>