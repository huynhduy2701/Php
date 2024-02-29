<?php
   class search {
    public function searchSanPham($keyword)
    {
        $db = new db();

        // Thực hiện truy vấn tìm kiếm sản phẩm dựa trên $keyword
        $query = "SELECT * FROM sanpham WHERE tensp LIKE '%$keyword%'";
        $result = $db->getList($query);

        // Xử lý kết quả truy vấn và trả về một mảng sản phẩm
        $products = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $products[] = $row;
        }

        return $products;
    }
    public function SortProduct($keyword, $sortOption = 'asc')
    {
        $db = new db();

        // Update the query to include sorting
        $query = "SELECT * FROM sanpham WHERE tensp LIKE '%$keyword%' ORDER BY gia $sortOption";
        $result = $db->getList($query);

        // Process the query result and return an array of products
        $products = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $products[] = $row;
        }

        return $products;
    }
}


?>