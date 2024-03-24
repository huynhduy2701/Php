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
        function UpdateCategory($id,$menu_name, $idMenu, $menu_url){
            $db= new connect();
            $query="UPDATE `menu` SET `menu_name` = '$menu_name', `parent` = '$idMenu', `menu_url` = '$menu_url' WHERE `menu`.`id` = $id;";
            $db->exec($query);


        }
        function xoaDanhMuc($id) {
            $db = new connect();
            $query = "DELETE FROM ctsp WHERE idsp = $id";
            $db->exec($query);
        }
    }
?>