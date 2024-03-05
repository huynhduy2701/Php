<?php
class loai{
    function getLoai(){
        $db= new connect();
        $select="select id ,menu_name from menu";
        $result=$db->getList($select);
        return $result;
    }
    function insLoai($menu_name, $parent, $menu_url)  {
        $db= new connect();
        $query="INSERT INTO `menu` (`id`, `menu_name`, `parent`, `menu_url`) VALUES (NULL, '$menu_name', '$parent', '$menu_url')";
        $db->exec($query);
    }
}
?>