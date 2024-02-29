<?php
class loai{
    function getLoai(){
        $db= new connect();
        $select="select id ,menu_name from menu";
        $result=$db->getList($select);
        return $result;
    }
}
?>