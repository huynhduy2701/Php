<?php
// Start the session


if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
?>

<!-- Hiển thị giỏ hàng -->
<div class="container mt-5">
    <div class="text-center">
        <div class="alert alert-primary" role="alert">
            <h3>Giỏ Hàng</h3>
        </div>
    </div>

    <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) : ?>
        <!-- <form action="./index.php?action=giohang&act=update" method="post" class="mt-5" onsubmit="return checkLogin()"> -->
        <form action="./index.php?action=giohang&act=update" method="post" class="mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th scope="col">Hình Sản Phẩm</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">size</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Thành Tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalAmount = 0;
                    $j = 0;
                  
                                // var_dump($_SESSION['cart']);
                           
                    foreach ($_SESSION['cart'] as $key => $item) :
                        $j++;
                        $totalAmount += $item['dongia'] * $item['soluong'];
                    ?>
                        <tr>
                            
                            <td scope="row"><?php echo $j ?></td>
                            <td>
                                <a  href="./index.php?action=sanpham&act=productdetail&id=<?= $set['mahh']; ?>">
                                    <img src="Content/img/<?php echo $item['hinh'] ?>" alt="" width="50px" height="50px">
                                 </a>
                            </td>
                            <td><?php echo $item['tenhh'] ?></td>
                            <td><?php echo $item['tensize'] ?></td>
                          
                            <td style="width: 90px;">
                                <!-- Sử dụng tên duy nhất cho mỗi sản phẩm -->
                                <input type="number" class='form-control' name="soluong[<?php echo isset($item['id']) ? $item['id'] : ''; ?>]" value="<?php echo $item['soluong'] ?>">

                            </td>
                            <td><?php echo number_format($item['dongia']) ?></td>
                            <td><?php echo number_format($item['dongia'] * $item['soluong']) ?></td>
                            <td>
                                <a onclick="confirmDelete(<?php echo $key; ?>)"  class="btn btn-danger btn-sm">Xóa</a>
                               

                            </td>
                        </tr>
                        
                    <?php endforeach; ?>
                    <tr>
                    <th colspan="4" class="text-center">Tổng Tiền</th>
                    <td colspan="2" class="text-center"><?php echo number_format($totalAmount) ?></td>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary" name="updateCart">Cập nhật</button>
                        <a type="button" class="btn btn-primary" onclick="proceedToPayment()">Thanh toán</a>
                        <a onclick="confirmDeleteAll()"   class="btn btn-danger btn-sm">Xóa Hết</a>
                        
                    </td>
                </tr>
            </table>
        </form>
        <?php endif; ?>

    <?php 
    }
    else {
        echo '<script> alert("Bạn chưa có giỏ hàng")</script>';
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home" />';
        
    }

    ?>
</div>
<script>
    function checkLogin() {
        // để kiểm tra xem biến session idUser có tồn tại hay không.
        // Nếu idUser tồn tại, biểu thức trả về 1, ngược lại trả về 0.
        // Nếu giá trị trả về là 1 (người dùng đã đăng nhập), hàm trả về true, cho phép nộp biểu mẫu.
        // Nếu giá trị trả về là 0 (người dùng chưa đăng nhập), hiển thị một thông báo cảnh báo và chuyển hướng trình duyệt đến trang đăng nhập (./index.php?action=dangnhap).
        // Cuối cùng, hàm trả về false để ngăn chặn nộp biểu mẫu.
        if ( '<?php echo isset($_SESSION['idUser']) ? 1 : 0; ?>' !== '1') {
            // If not logged in, display a message and redirect to the login page
            Swal.fire({
            title: "Bạn Vui Lòng Đăng Nhập Để Thanh Toán",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Có",

        }).then((result) => {
            if (result.isConfirmed) {
                // Nếu người dùng nhấp vào "Có, xóa hết!", chuyển hướng đến hành động xóa hết
                window.location.href = './index.php?action=dangnhap';
            }
        });
           
            return false; // Prevent the form submission
        }
        return true; // Allow the form submission
    }

    function proceedToPayment() {
        // Hàm này được sử dụng để chuyển hướng người dùng đến trang thanh toán sau khi kiểm tra xem họ đã đăng nhập hay chưa.
        if (checkLogin()) {
            //Gọi hàm checkLogin() để kiểm tra đăng nhập.
            //Nếu người dùng đã đăng nhập (checkLogin() trả về true), 
            // thực hiện chuyển hướng đến trang thanh toán (./index.php?action=buy).
            // Nếu người dùng chưa đăng nhập, không có hành động được thực hiện.
            window.location.href = './index.php?action=buy';
        }
    }
   
    function confirmDelete(key) {
    Swal.fire({
        title: "Bạn Có Muốn Xóa?",
        text: "Khi Xóa Bạn Không Thể Khôi Phục Nó",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Có"
    }).then((result) => {
        if (result.isConfirmed) {
            // If the user clicks "Yes, delete it!", redirect to the delete action
            window.location.href = "./index.php?action=delete&item_key=" + key;
        }
    });
    }
    function confirmDeleteAll() {
        Swal.fire({
            title: "Bạn Có Muốn Xóa Hết?",
            text: "Khi Xóa Bạn Không Thể Khôi Phục Nó",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Có"
        }).then((result) => {
            if (result.isConfirmed) {
                // Nếu người dùng nhấp vào "Có, xóa hết!", chuyển hướng đến hành động xóa hết
                window.location.href = "./index.php?action=giohang&act=deleteAll";
            }
        });
    }

    function confirmThanhToan(){
      
    }
</script>
