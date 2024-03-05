<?php
$act='loai';
if (isset($_GET['act'])) {
    # code...
    $act=$_GET['act'];
}
switch ($act) {
    case 'loai':
        # code...
        include_once "./View/addloaisanpham.php";
        break;
    case 'loai_file':
        # code...
       //chosse file lúc nòa cũng lưu vào trogn $_File[name trong input][4 thuộc tính]
       //4 thuộc tính [tmp_name],[name],[size],[error]

       //lấy về thì kiểm tra
       if (isset($_POST['submit_file'])) {
        # code...
        //trong file lấy về mở ra và đọc nó
        //b1 :lấy file về
        $file=$_FILES['file']['tmp_name'];
        //b2 thay thế những kí tự đặc biệt xEF,xBB,xBF
        file_put_contents($file,str_replace("\xEF\xBB\xBF","",file_get_contents($file)));//put nội dung ngược lại vào file và thay thế mấy xEF,xBB,xBF thành khoảng trắng
        //b3:mở file ra
        $File_open=fopen($file,"r");
        //bước 4 đọc nội dung
        while(($csv=fgetcsv($File_open,1000,","))!==false){
            //$csv = [null,mắt kính cho nữ,5]
            $maloai=$csv[0];
            $menu_name=$csv[1];
            $parent=$csv[2];
            $menu_url=$csv[3];
            $db = new connect();
            $query= "insert into menu (id,menu_name,parent,menu_url) values ($maloai,$menu_name, $parent, $menu_url)";
            $db->exec($query);
        }
        echo "<script>alert('importthanh cong')</script>";
       }
        break;
    case 'loai_action';
    if (isset($_POST['submit'])) {
        $menu_name = $_POST['namecatagory'];
        $menu_url = $_POST['nameUrl'];

        // Kiểm tra xem người dùng đã chọn button nào
        if ($_POST['button1'] == '1') {
            // Nếu người dùng chọn button 1, thêm dữ liệu vào parent
            $parent = $_POST['idParent'];
            $db = new loai();
            $db->insLoai($menu_name, $parent, $menu_url);
            // echo "<script>alert('Thêm thành công')</script>";
            echo '<script>
            Swal.fire({
                position: "top-center",
                icon: "success",
                title: "Thêm thành công",
                showConfirmButton: false,
                timer: 1000 
            });
            setTimeout(function() {
                window.location.href = "./index.php?action=danhsach";
            }, 1000); // Chuyển hướng sau 10 giây
        </script>';
        } elseif ($_POST['button1'] == '2') {
            // Nếu người dùng chọn button 2, thêm dữ liệu vào idMenu
            $idMenu = $_POST['idMenu'];
            $db = new loai();
            $db->insLoai($menu_name, $idMenu, $menu_url); // Chú ý: Ở đây bạn đã sử dụng $idMenu thay vì $parent như trường hợp trên
            echo '<script>
            Swal.fire({
                position: "top-center",
                icon: "success",
                title: "Thêm thành công",
                showConfirmButton: false,
                timer: 1000 
            });
            setTimeout(function() {
                window.location.href = "./index.php?action=loai";
            }, 1000); // Chuyển hướng sau 10 giây
        </script>';
        }
    }
    break;
    default:
        # code...
        break;
}
?>