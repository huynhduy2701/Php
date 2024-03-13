<?php
   class chitiet {
    function getInsCTSP($idSp, $idSize, $dongia, $giamGia) {
        $db = new connect();
        $query = "INSERT INTO `ctsp` (`idsp`, `idsize`, `dongia`, `giamgia`) VALUES ('$idSp', '$idSize', '$dongia', '$giamGia')";
        $result = $db->exec($query); 
        return $result; // Trả về kết quả của truy vấn
    }
    function getIdSanpham(){
        $db= new connect();
        $select="SELECT tensp,masp from sanpham";
        $result=$db->getList($select);
        return $result;
    }
    function getSizes()
  {
      $db = new connect();
      $select = "SELECT idsize, tensize FROM sizesp";
      $result = $db->getList($select);
      return $result;
  }
    function getChitietId($id){
            $db= new connect();
            $select="select * from ctsp where idsp='$id'";
            $result=$db->getInstance($select);
            return $result;
    }
    function getChiTiet(){
        $db = new connect();
        $select="SELECT a.idsp ,a.idsize,a.dongia,a.giamgia , b.tensp , b.masp,c.idsize,c.tensize FROM ctsp a , sanpham b ,sizesp c WHERE a.idsp=b.masp AND a.idsize=c.idsize;";
        $result=$db->getList($select);
        return $result;
    }
  
    function updateChitiet($idsp, $idsize, $dongia, $giamgia) {
        $db = new connect();
        $query = "UPDATE `ctsp` SET `idsize` = '$idsize', `dongia` = '$dongia', `giamgia` = '$giamgia' WHERE `ctsp`.`idsp` = $idsp";
        $db->exec($query);
    }
    
}
?>