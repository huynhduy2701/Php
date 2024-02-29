<?php
    class binhluan{
        function thembl($name, $iduser, $idsp, $noidung) {
            $db = new db();
            $query = "INSERT INTO binhluan(name, iduser, idsp, noidung) VALUES (?, ?, ?, ?)";
            $stmt = $db->execep($query);
            $stmt->execute([$name, $iduser, $idsp, $noidung]);
            return $stmt->rowCount(); // Return the number of affected rows
        }
    
        function showbl() {
            $db = new db();
            $select = "SELECT * FROM binhluan ORDER BY id DESC";
            $result = $db->getList($select);
            return $result;
        }
    }
?>