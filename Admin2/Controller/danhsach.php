<?php
    $act='danhsach';
    if (isset($_GET['act'])) {
        # code...
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'danhsach':
            # code...
        include_once "./View/danhsach.php";
        
            break;
        case 'danhsach_action':
            # code...
            include_once "./View/editCategory.php";
            break;
            case 'capnhat':
                if (isset($_POST['submit_editcate'])) {
                    // Kiểm tra giá trị của $_POST để xem giá trị của id đã được gửi đi hay không
                    // var_dump($_POST);
                    $id = isset($_POST['id']) ? $_POST['id'] : null;
                    // var_dump( $id);
                    // Kiểm tra xem $id có null hay không
                    if ($id !== null) {
                        $menu_name = $_POST['namecatagory'];
                        $menu_url = $_POST['nameUrl'];
                
                        // Kiểm tra xem người dùng đã chọn button nào
                        if (isset($_POST['button1'])) {
                            if ($_POST['button1'] == '1') {
                                // Nếu người dùng chọn button 1, thêm dữ liệu vào parent
                                $parent = $_POST['idParent'];
                                $db = new danhsach();
                                $db->UpdateCategory($id, $menu_name, $parent, $menu_url);
                                // echo "<script>alert('Cập Nhật Thành Công')</script>";
                                echo '<script>
                                    Swal.fire({
                                        position: "top-center",
                                        icon: "success",
                                        title: "Cập Nhật Thành Công",
                                        showConfirmButton: false,
                                        timer: 1000 
                                    });
                                    setTimeout(function() {
                                        window.location.href = "./index.php?action=danhsach&act=danhsach";
                                    }, 1000); // Chuyển hướng sau 10 giây
                                </script>';
                            } elseif ($_POST['button1'] == '2') {
                                // Nếu người dùng chọn button 2, thêm dữ liệu vào idMenu
                                $idMenu = $_POST['idMenu'];
                                $db = new danhsach();
                                $db->UpdateCategory($id, $menu_name, $idMenu, $menu_url);
                                echo '<script>
                                    Swal.fire({
                                        position: "top-center",
                                        icon: "success",
                                        title: "Cập Nhật Thành Công",
                                        showConfirmButton: false,
                                        timer: 1000 
                                    });
                                    setTimeout(function() {
                                        window.location.href = "./index.php?action=danhsach&act=danhsach";
                                    }, 1000); // Chuyển hướng sau 10 giây
                                </script>';
                            }
                        } else {
                            echo '<script>
                                Swal.fire({
                                    position: "top-center",
                                    icon: "error",
                                    title: "Chưa Chọn Menu Số",
                                    showConfirmButton: false,
                                    timer: 1000 
                                });
                                setTimeout(function() {
                                    window.location.href = "./index.php?action=danhsach&act=danhsach";
                                }, 1000); // Chuyển hướng sau 10 giây
                            </script>';
                        }
                    } else {
                        // Xử lý trường hợp $id là null
                        // Ví dụ: in ra thông báo lỗi
                        // echo "ID không hợp lệ";
                        echo '<script>
                            Swal.fire({
                                position: "top-center",
                                icon: "error",
                                title: "ID không hợp lệ",
                                showConfirmButton: false,
                                timer: 1000 
                            });
                            setTimeout(function() {
                                window.location.href = "./index.php?action=danhsach&act=danhsach";
                            }, 1000); // Chuyển hướng sau 10 giây
                        </script>';
                    }
                }
            break;
            case 'xoa':
                $id = isset($_GET['id']) ? $_GET['id'] : null;
                if ($id !== null) {
                    $db = new danhsach();
                    $db->xoaDanhMuc($id);
                    echo '<script>
                            Swal.fire({
                                position: "top-center",
                                icon: "success",
                                title: "Xóa thành công",
                                showConfirmButton: false,
                                timer: 1000
                            });
                            setTimeout(function() {
                                window.location.href = "./index.php?action=danhsach&act=danhsach";
                            }, 1000); // Chuyển hướng sau 1 giây
                        </script>';
                } else {
                    echo '<script>
                            Swal.fire({
                                position: "top-center",
                                icon: "error",
                                title: "ID không hợp lệ",
                                showConfirmButton: false,
                                timer: 1000
                            });
                            setTimeout(function() {
                                window.location.href = "./index.php?action=danhsach&act=danhsach";
                            }, 1000); // Chuyển hướng sau 1 giây
                        </script>';
                }
                break;
        default:
            # code...
            break;
    }
?>