<?php
    class binhluan{
        function thembl( $iduser,$masp,$noidung) {
            $db = new db();
            $query = "INSERT INTO binhluan (id, idUser, noidung, postdate, masp) VALUES (NULL, ' $iduser', '$noidung', NULL, '$masp')";
            $result=$db->exec( $query);
            return $result;
        }
    
        function showbl($id) {
            $db = new db();
            $select = "SELECT a.idUser AS idUser_a, a.noidung AS noidung_a, a.masp AS masp_a, b.idUser AS idUser_b, b.username AS username_b 
                       FROM binhluan a 
                       JOIN user b ON a.idUser = b.idUser 
                       WHERE a.masp = $id  -- Add this condition
                       ORDER BY a.id DESC LIMIT 0, 25;";
            $result = $db->getList($select);
            return $result;
        }
    }
?>