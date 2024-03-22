
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
        $thembl = $bl->thembl($idUser,$masp,$noidung);
        echo '<script>
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Bình Luận Thành Công",
            showConfirmButton: false,
            timer: 50000
          });
          setTimeout(function() {
            window.location.href = "./index.php?action=sanpham&act=productdetail&id='.$masp.'";
        }, 1000); // Chuyển hướng sau 10 giây
        </script>';
        
      
    }
  
    
}
?>