
<div class="row">

<div class="d-flex mt-5">
        <!-- <form action="./index.php?action=search&act=search-product" method="post"> -->
        <div class="d-flex mt-5">
    <form action="./index.php?action=search&act=sortProduct" method="post">
        <select id="sortOption" class="form-control" name="sort_option" style="width: 150px; display: inline-block; margin-right: 10px;">
            <option value="asc">Giá Từ Thấp Đến Cao</option>
            <option value="desc">Giá Từ Cao Đến Thấp</option>
        </select> 
        <input type="submit" value="Tìm Kiếm" class="btn btn-primary" name="search">
    </form>
</div>
    </div> 
    <div class="">
        
    <?php
          $search = $_POST['search_keyword'];
          echo "Kết quả tìm Kiếm : <a href='#'>" .$search ."</a>";
    ?>
    </div>
    <?php
        if (isset($search_results) && !empty($search_results)) {
        foreach ($search_results as $product) {
          ?>
          <div class="col-lg-3 col-md-4 mb-3 text-left mt-5 ">
        <div class="card ">
            <a href="./index.php?action=sanpham&act=productdetail&id=<?= $product['masp']; ?>">
            <img src="Content/img/<?php echo $product['hinh'] ?>" class="img-fluid align-items-center" alt="" style="width: 162px; height: 170px; margin: auto; display: flex;"><path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path></svg>
            <div class="card__content">
                <p class="card__title"><?php echo $product['tensp'] ?></p>
                <p class="card__description"><?php echo $product['mota'] ?></p>
            </div>
            </a>
        </div>
    </div>
        <?php
   }
} else {
    echo '<p>No results found.</p>';
}
?>

</div>



<style>
    .card {
  position: relative;
  width: 300px;
  height: 200px;
  background-color: #f2f2f2;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  perspective: 1000px;
  box-shadow: 0 0 0 5px #ffffff80;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);

}

.card svg {
  width: 48px;
  fill: #333;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 16px rgba(255, 255, 255, 0.2);
}

.card__content {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  padding: 20px;
  box-sizing: border-box;
  background-color: #f2f2f2;
  transform: rotateX(-90deg);
  transform-origin: bottom;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.card:hover .card__content {
  transform: rotateX(0deg);
}

.card__title {
  margin: 0;
  font-size: 24px;
  color: #333;
  font-weight: 700;
}

.card:hover svg {
  scale: 0;
}

.card__description {
  margin: 10px 0 0;
  font-size: 14px;
  color: #777;
  line-height: 1.4;
}

 </style>