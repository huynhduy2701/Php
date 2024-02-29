<?php
    class giohang{
    //     function addGioHang($id, $idsize, $soluong)
    // {
    //     $hh = new sanpham();
    //     $sanphamResult = $hh->producttail($id);
    //     $tensize= $hh->getTenSize($idsize);
    //      // Duyệt qua giỏ hàng để kiểm tra sự tồn tại của sản phẩm với cùng mahh và tensize
    //     foreach ($_SESSION['cart'] as &$item) {
    //         if ($item['mahh'] == $id && $item['tensize'] == $tensize) {
    //             // Nếu sản phẩm đã tồn tại, chỉ cần tăng số lượng
    //             $item['soluong'] += $soluong;
    //             // Cập nhật lại thành tiền
    //             $item['thanhtien'] = $item['soluong'] * $item['dongia'];
    //             return;
    //         }
    //     }
    //     if ($sanphamResult) {
    //         $sanpham = $sanphamResult->fetch(PDO::FETCH_ASSOC);

    //         $tenhh = $sanpham['tensp'];
    //         $dongia = $sanpham['dongia'];
    //         // $size = $idsize;
    //         // $tensize=$tensize;

    //         //lấy hình dựa vào id sản phẩm
    //         $hinhResult = $hh->getHinh($id);
    //         $hinh = $hinhResult->fetch(PDO::FETCH_ASSOC);
    //         $img = $hinh['hinh'];

    //         $total = $soluong * $dongia;
    //         //tạo ra đối tượng
    //         $item = array(
    //             'mahh' => $id,
    //             'tenhh' => $tenhh,
    //             'hinh' => $img,
    //             // 'size' => $size,
    //             'tensize' => $tensize,
    //             'soluong' => $soluong,
    //             'dongia' => $dongia,
    //             'thanhtien' => $total
    //         );
    //         //dem đối tượng vào giỏ hang
    //         $_SESSION['cart'][] = $item;
    //     } else {
    //         // Handle the case where there's an issue with fetching the data
    //         echo "Error fetching product details.";
    //     }
// Nếu sản phẩm đã tồn tại
                // if ($item['tensize'] == $tensize) {
                //     // Nếu cùng size, chỉ cần tăng số lượng
                //     $flagSize=true;
                //     $item['soluong'] += $soluong;
                // } else {
                //     // Nếu khác size, thêm mới vào giỏ hàng
                //     $newItem = array(
                //         'mahh' => $id,
                //         'tenhh' => $item['tenhh'],
                //         'hinh' => $item['hinh'],
                //         'tensize' => $tensize,
                //         'soluong' => $soluong,
                //         'dongia' => $item['dongia'],
                //         'thanhtien' => $soluong * $item['dongia']
                //     );
                //     $_SESSION['cart'][] = $newItem;
                // }
                // return;

    // }
    
 
    function addGioHang($id, $idsize, $soluong) {
        $hh = new sanpham();
        $sanphamResult = $hh->producttail($id);
        $tensize = $hh->getTenSize($idsize);
         $flag=false;
       
         var_dump( $sanphamResult);
         $sanpham = $sanphamResult->fetch(PDO::FETCH_ASSOC);

         $tenhh = $sanpham['tensp'];
         $dongia = $sanpham['dongia'];

         //lấy hình dựa vào id sản phẩm
         $hinhResult = $hh->getHinh($id);
         $hinh = $hinhResult->fetch(PDO::FETCH_ASSOC);
         $img = $hinh['hinh'];

         $total = $soluong * $dongia;
        // Duyệt qua giỏ hàng để kiểm tra sự tồn tại của sản phẩm với cùng mahh
        foreach ($_SESSION['cart'] as $index=>$item) {
            $flagSize=false;
            if ($item['mahh'] == $id) {
                $flag=true;
                if ($item['tensize']==$tensize) {
                    $flagSize=true;
                }
            }
            if ( $flag&&$flagSize) {
                # code...
                $_SESSION['cart'][$index]['soluong'] +=1;
                $flag=false;
                $flagSize=false;
            }
            
        }

        // Nếu sản phẩm không tồn tại, thêm mới vào giỏ hàng
        if (  $sanphamResult) {
            $sanpham = $sanphamResult->fetch(PDO::FETCH_ASSOC);

            $tenhh = $sanpham['tensp'];
            $dongia = $sanpham['dongia'];

            //lấy hình dựa vào id sản phẩm
            $hinhResult = $hh->getHinh($id);
            $hinh = $hinhResult->fetch(PDO::FETCH_ASSOC);
            $img = $hinh['hinh'];

            $total = $soluong * $dongia;

            //tạo ra đối tượng
            $item = array(
                'mahh' => $id,
                'tenhh' => $tenhh,
                'hinh' => $img,
                'tensize' => $tensize,
                'soluong' => $soluong,
                'dongia' => $dongia,
                'thanhtien' => $total
            );

            // Đưa đối tượng vào giỏ hàng
            $_SESSION['cart'][] = $item;
        } else {
            // Xử lý trường hợp có vấn đề khi truy xuất dữ liệu
            echo "Error fetching product details.";
        }
    }
    }
?>