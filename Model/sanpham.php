<?php
    class sanpham{
          //thuộc tính
        //hàm tạo
        //phương thức lấy sản phẩm mới
      
        
        function getsanpham(){
            //b1:kết nối được với dữ liệu
            include_once 'db.php';
            $db= new db();
             //b2:cần lấy gì thì viết câu lệnh seclect cái đó
             $select='SELECT a.masp, a.tensp, a.soluotmua, a.hinh, b.dongia FROM sanpham a, ctsp b WHERE a.masp = b.idsp ORDER BY a.masp';
                //bước 3 ai thực hiện câu select ? query , mà query nằm trong getList và get Instance ?
            //câu này trả về nhiều dòng nên dùng getList
            $result=$db->getList($select)   ;
            return $result;//lấy được về 8 sản phẩm mới nhất
        }
        function getsanphambestsaler(){
            //b1:kết nối được với dữ liệu
            include_once 'db.php';
            $db= new db();
             //b2:cần lấy gì thì viết câu lệnh seclect cái đó
             $select='SELECT a.masp, a.tensp,a.mota, a.soluotmua, a.hinh, b.dongia FROM sanpham a JOIN ctsp b ON a.masp = b.idsp WHERE a.soluotmua >= 68 ORDER BY a.masp';
                //bước 3 ai thực hiện câu select ? query , mà query nằm trong getList và get Instance ?
            //câu này trả về nhiều dòng nên dùng getList
            $result=$db->getList($select)   ;
            return $result;//lấy được về 8 sản phẩm mới nhất
        }
        function getSanPhamSale(){
            //b1: kết nối với dữ liệu
            $db= new db();
            //cần gì thì select xem
            $select='SELECT a.masp, a.tensp, a.soluotmua, a.hinh, b.dongia,b.giamgia FROM sanpham a, ctsp b WHERE a.masp = b.idsp AND b.giamgia != 0 ORDER BY a.masp';
            $result=$db->getList($select);
            return $result;
        }
        // function getBacXiu () {
        //     $db= new db();
        //     $select="SELECT a.masp, a.tensp, a.hinh,a.url_sp, b.dongia FROM sanpham a, ctsp b WHERE a.masp = b.idsp AND a.url_sp ='bacxiuda' ORDER BY a.masp;";
        //     $result=$db->getList($select);
        //     return $result;
        // }
        function getSanPhamNewPage($start,$limit){
            //b1: kết nối với dữ liệu
            $db= new db();
            //cần gì thì select xem
            $select='SELECT a.masp, a.tensp, a.soluotmua, a.hinh, b.dongia,b.giamgia FROM sanpham a, ctsp b WHERE a.masp = b.idsp AND b.giamgia = 0 ORDER BY a.masp  LIMIT ' . $start . "," . $limit;
            $result=$db->getList($select);
            return $result;
        }

        function getSanPhamPhinDi(){
            $db=new db();
            $select="SELECT a.masp, a.tensp,a.mota, a.idMenu, a.soluotmua, a.hinh, b.id, b.menu_url,c.idsp,c.dongia
            FROM sanpham a, menu b,ctsp c 
            WHERE a.masp=c.idsp AND a.idMenu = b.id AND b.menu_url = 'phindikemsua';
            ";
            $result= $db->getList($select);
            return $result;
        }
        function getSanPhamBacXiuDa(){
            $db=new db();
            $select="SELECT a.masp, a.tensp,a.mota, a.idMenu, a.soluotmua, a.hinh, b.id, b.menu_url,c.idsp,c.dongia FROM sanpham a, menu b,ctsp c WHERE a.masp=c.idsp AND a.idMenu = b.id AND b.menu_url = 'bacxiuda';
            ";
            $result= $db->getList($select);
            return $result;
        }
        function traquamonganhdao(){
            $db=new db();
            $select="SELECT a.masp, a.tensp,a.mota, a.idMenu, a.soluotmua, a.hinh, b.id, b.menu_url,c.idsp,c.dongia
            FROM sanpham a, menu b,ctsp c 
            WHERE a.masp=c.idsp AND a.idMenu = b.id AND b.menu_url = 'traquamonganhdao';
            ";
            $result= $db->getList($select);
            return $result;
        }
        function traxanhdaudo(){
            $db=new db();
            $select="SELECT a.masp, a.tensp,a.mota, a.idMenu, a.soluotmua, a.hinh, b.id, b.menu_url,c.idsp,c.dongia
            FROM sanpham a, menu b,ctsp c 
            WHERE a.masp=c.idsp AND a.idMenu = b.id AND b.menu_url = 'traxanhdaudo';
            ";
            $result= $db->getList($select);
            return $result;
        }
        function trathachvai(){
            $db=new db();
            $select="SELECT a.masp, a.tensp,a.mota, a.idMenu, a.soluotmua, a.hinh, b.id, b.menu_url,c.idsp,c.dongia
            FROM sanpham a, menu b,ctsp c 
            WHERE a.masp=c.idsp AND a.idMenu = b.id AND b.menu_url = 'trathachvai';
            ";
            $result= $db->getList($select);
            return $result;
        }
        function freezetraxanh(){
            $db=new db();
            $select="SELECT a.masp, a.tensp,a.mota, a.idMenu, a.soluotmua, a.hinh, b.id, b.menu_url,c.idsp,c.dongia
            FROM sanpham a, menu b,ctsp c 
            WHERE a.masp=c.idsp AND a.idMenu = b.id AND b.menu_url = 'freezetraxanh';
            ";
            $result= $db->getList($select);
            return $result;
        }
        function cookiescream(){
            $db=new db();
            $select="SELECT a.masp, a.tensp,a.mota, a.idMenu, a.soluotmua, a.hinh, b.id, b.menu_url,c.idsp,c.dongia
            FROM sanpham a, menu b,ctsp c 
            WHERE a.masp=c.idsp AND a.idMenu = b.id AND b.menu_url = 'cookiescream';
            ";
            $result= $db->getList($select);
            return $result;
        }
        function freezequamonganhdao(){
            $db=new db();
            $select="SELECT a.masp, a.tensp,a.mota, a.idMenu, a.soluotmua, a.hinh, b.id, b.menu_url,c.idsp,c.dongia
            FROM sanpham a, menu b,ctsp c 
            WHERE a.masp=c.idsp AND a.idMenu = b.id AND b.menu_url = 'freezequamonganhdao';
            ";
            $result= $db->getList($select);
            return $result;
        }
        function banhphomaitraxanh(){
            $db=new db();
            $select="SELECT a.masp, a.tensp,a.mota, a.idMenu, a.soluotmua, a.hinh, b.id, b.menu_url,c.idsp,c.dongia
            FROM sanpham a, menu b,ctsp c 
            WHERE a.masp=c.idsp AND a.idMenu = b.id AND b.menu_url = 'banhphomaitraxanh';
            ";
            $result= $db->getList($select);
            return $result;
        }      
        function banhphomaichanhday(){
            $db=new db();
            $select="SELECT a.masp, a.tensp,a.mota, a.idMenu, a.soluotmua, a.hinh, b.id, b.menu_url,c.idsp,c.dongia
            FROM sanpham a, menu b,ctsp c 
            WHERE a.masp=c.idsp AND a.idMenu = b.id AND b.menu_url = 'banhphomaichanhday';
            ";
            $result= $db->getList($select);
            return $result;
        }
        function banhmoussedao(){
            $db=new db();
            $select="SELECT a.masp, a.tensp,a.mota, a.idMenu, a.soluotmua, a.hinh, b.id, b.menu_url,c.idsp,c.dongia
            FROM sanpham a, menu b,ctsp c 
            WHERE a.masp=c.idsp AND a.idMenu = b.id AND b.menu_url = 'banhmoussedao';
            ";
            $result= $db->getList($select);
            return $result;
        }
        function trasuamaccatranchau(){
            $db=new db();
            $select="SELECT a.masp, a.tensp,a.mota, a.idMenu, a.soluotmua, a.hinh, b.id, b.menu_url,c.idsp,c.dongia
            FROM sanpham a, menu b,ctsp c 
            WHERE a.masp=c.idsp AND a.idMenu = b.id AND b.menu_url = 'trasuamaccatranchau';
            ";
            $result= $db->getList($select);
            return $result;
        }
        function trasuaolongnuong(){
            $db=new db();
            $select="SELECT a.masp, a.tensp,a.mota, a.idMenu, a.soluotmua, a.hinh, b.id, b.menu_url,c.idsp,c.dongia
            FROM sanpham a, menu b,ctsp c 
            WHERE a.masp=c.idsp AND a.idMenu = b.id AND b.menu_url = 'trasuaolongnuong';
            ";
            $result= $db->getList($select);
            return $result;
        }
        function hongtrasuanong(){
            $db=new db();
            $select="SELECT a.masp, a.tensp,a.mota, a.idMenu, a.soluotmua, a.hinh, b.id, b.menu_url,c.idsp,c.dongia
            FROM sanpham a, menu b,ctsp c 
            WHERE a.masp=c.idsp AND a.idMenu = b.id AND b.menu_url = 'hongtrasuanong';
            ";
            $result= $db->getList($select);
            return $result;
        }
        function getSanPhamMenu($url){
            $db = new db();
            $select = "SELECT a.masp, a.tensp, a.mota, a.idMenu, a.soluotmua, a.hinh, b.id, b.menu_url, b.menu_name, c.idsp, c.dongia
                       FROM sanpham a, menu b, ctsp c 
                       WHERE a.masp = c.idsp AND a.idMenu = b.id AND b.menu_url = '$url'";
            $result = $db->getList($select);
            return $result;
        }
        function producttail($id) {
            $db = new db();
            $select = "SELECT a.masp,a.tensp,a.idMenu,a.mota,a.hinh,b.idsp,b.dongia,c.idsize,c.tensize FROM sanpham a, ctsp b, sizesp c WHERE a.masp={$id} AND b.idsp={$id};";
            $result = $db->getList($select);
            return $result;
        }
      //
      function getHinh($id)  {
        $db= new db();
        $select="SELECT a.masp,a.hinh,a.tensp FROM sanpham a WHERE a.masp=($id)";
        $result=$db->getList($select);
        return $result;
      }

      function getSizes()
      {
          $db = new db();
          $select = "SELECT idsize, tensize FROM sizesp";
          $result = $db->getList($select);
          return $result;
      }

    //   function searchSp($tensp,$dongia){
    //     $db= new db();
    //     $select= "SELECT a.masp, a.tensp, a.hinh, b.dongia,b.giamgia FROM sanpham a, ctsp b WHERE a.masp = b.idsp AND a.tensp='$tensp' AND b.dongia='$dongia'";
    //     $result=$db->getList($select);
    //     return $result;
    //   }
    function getTenSize($id){
        $db=new db();
        $select="select tensize from sizesp where idsize=$id";
        $result=$db->getInstance($select);
        return $result[0];
    }
 
    }
?>