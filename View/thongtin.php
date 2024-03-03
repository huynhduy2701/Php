<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Thông Tin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Đơn Hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="border">
            <table class="table table-hover  ">
               <thead class="table-success">
                    <tr>
                        <th>STT</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Size</th>
                        <th>Số Lượng</th>
                        <th>Đơn Giá</th>
                        <th>Phương Thức Thanh Toán</th>
                        <th>Trạng Thái</th>
                    </tr>
               </thead>
               <tbody>
                
               <?php
                    // Kiểm tra nếu có dữ liệu được truyền từ controller
                    if (!empty($data)) {
                        var_dump($data); // Hiển thị dữ liệu để kiểm tra
                        $stt = 1; // Biến đếm số thứ tự
                        // Lặp qua mảng dữ liệu để hiển thị thông tin
                        foreach ($data as $row) {
                    ?>
                            <tr>
                                <td><?php echo $stt; ?></td>
                                <td><?php echo $row['tensp']; ?></td>
                                <td><?php echo $row['tensize']; ?></td>
                                <td><?php echo $row['soluong']; ?></td>
                                <td><?php echo $row['dongia']; ?></td>
                                <td><?php echo $row['tenthanhtoan']; ?></td>
                            </tr>
                    <?php
                            $stt++; // Tăng số thứ tự lên sau mỗi lần lặp
                        }
                    }
                    ?>
               </tbody>
            </table>
            </div>
        </div>
    </div>
</div>