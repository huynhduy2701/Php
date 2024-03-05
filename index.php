<?php
session_start();
  // //model làm xong phải dổi về controller và index ,tốt nhất đỗ về index thì view sẽ được nhìn thấy
  // include_once 'Model/db.php';
  // include_once 'Model/sanpham.php';
  //----------------------------------------------------------------

  // spl_autoload : tự động load lên những lớp hướng đối tượng , tức là class phỉa đăng kí
  //dùng để inlcu nhiều dòng tha gì inlcude giống trên
 include_once "Model/class.phpmailer.php";
  spl_autoload_register('autoLoadModel');
  function autoLoadModel($classname){
    $path='Model/' ;
    include_once $path.$classname.'.php';
  }


 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./Content/index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-oZ3+8oHzlE65Zt9NOdzg5jvD6MbYH8pH8ht+jBbPRuS3BjVI5uzJ6"
        crossorigin="anonymous"></script>

        <link href="./Content/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="./Content/css/tiny-slider.css" rel="stylesheet">
		<link href="./Content/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
        <title>Cà Phê</title>
</head>
<style>
  body{
   
}
.btn-danger{
   background-color:#b22830 ;
   border:none
}
body {
  font-family: "Inter", sans-serif;
  font-weight: 400;
  line-height: 28px;
  color: #6a6a6a;
  font-size: 14px;

 }
 
</style>
<body>



 <!-- header -->

 
    <?php
    include_once 'View/header.php';
     if (!isset($_GET['act'])||$_GET['act']=='home'||!isset($_GET['action'])=='thongtin') { 
      include_once 'View/nav.php';
    }
   
    ?>

    
    <!-- hiên thi noi dung -->
      <div class="container">
          <div class="row">
         
          <!-- hien thi noi dung đây -->
              <!-- index/controller -->
              <?php
                   //muốn hiển thị trang nào đầu tiên thì khởi tạo biến là trang đó
                  //  $ctrl='home ';
                  //  //index gọi controller
                  //  if (isset($_GET['action'])) {
                  //   # code...
                  //   $ctrl=$_GET['action'];//sanpham
                  //  }
                  //  include_once "Controller/$ctrl.php";

                  $ctrl = isset($_GET['action']) ? $_GET['action'] : 'home';
                  if (isset($_GET['action'])) {
                    //   # code...
                      $ctrl=$_GET['action'];//sanpham
                    }
                     include_once "Controller/$ctrl.php";
                
              ?>
          </div>
      </div>
    <!-- hiên thị footer -->
<?php
  if (!isset($_GET['action'])=='thongtin') { 
    include_once 'View/footer.php';
 }

 
?>

</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>

<script src="js/bootstrap.bundle.min.js"></script>
		<script src="./Content/js/tiny-slider.js"></script>
		<script src="./Content/js/custom.js"></script>
</body>
</html>