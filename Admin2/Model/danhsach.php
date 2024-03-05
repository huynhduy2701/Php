<?php
    class danhsach{
        function getDanhsachDanhMuc(){
            $db= new connect();
            $select= "SELECT * FROM menu";
            $result = $db->getList($select);
            return $result;
        }
        function getTenDanhMuc($id){
            $db= new connect();
            $select= "SELECT menu_name FROM `menu` WHERE id= $id;";
            $result = $db->getList($select);
            return $result;
        }
        function getMenuId($id){
            $db= new connect();
            $select= "SELECT * FROM `menu` WHERE id= $id;";
            $result = $db->getList($select);
            return $result;
        }
    }
?>