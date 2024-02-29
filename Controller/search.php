
<?php


include_once "./Model/giohang.php";

$act = isset($_GET['act']) ? $_GET['act'] : '';
$search=$_POST['search_keyword'];
echo $search;
if ($act === 'search-product') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_keyword'])) {
        $search = $_POST['search_keyword'];
        $_SESSION['search_keyword'] = $search; // Lưu giá trị vào session
        $kn = new search();
        $search_results = $kn->searchSanPham($search);
        include_once './View/search.php';
        // echo "Người dùng đã nhập: " . $search;
    } 
    else {
        // Redirect to home or display an error message
        header("Location: ./index.php");
        exit();
    }
}


?>