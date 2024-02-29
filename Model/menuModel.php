<?php
// include_once "Model/db.php";

// $obj = new db;
// $result = $obj->query('SELECT * FROM menu');

// menu($result);

// function menu($data, $parent_id = 0) {
//     foreach ($data as $key => $value) {
//         if ($value['parent'] == $parent_id) {
//             html($data, $value);
//         }
//     }
// }

// function html($data, $menu) {
//     $count = 0;
//     foreach ($data as $key => $value) {
//         if ($value['parent'] == $menu['id']) {
//             $count++;
//         }
//     }

//     if ($count > 0) {
//         echo "<li><a href='#'>" . ucfirst($menu['menu_name']) . "</a><ul class='dropdown'>";
//         menu($data, $menu['id']);
//         echo '</ul></li>';
//     } else {
//         // Tạo liên kết với action, giữ nguyên chữ hoa/chữ thường
//         $action = strtolower(str_replace(" ", "", $menu['menu_url']));
//         echo "<li><a href='./index.php?action=sanpham&act=$action'>".ucfirst($menu['menu_name']) . '</a></li>';
//     }
// }
// class menuModel{
//     function getMenu(){
//         include_once "Model/db.php";
    
//     $obj = new db;
//     $result = $obj->query('SELECT * FROM menu');
//     return $result;
//     }
// }
class MenuModel {
    public function getMenu() {
        include_once "Model/db.php";
        $obj = new db;
        $result = $obj->query('SELECT * FROM menu');
        return $result;
    }

    public function generateMenuHTML($data, $parent_id = 0) {
        $html = '';
        foreach ($data as $key => $value) {
            if ($value['parent'] == $parent_id) {
                $html .= $this->generateMenuItemHTML($data, $value);
            }
        }
        return $html;
    }

    private function generateMenuItemHTML($data, $menu) {
        $count = 0;
        foreach ($data as $key => $value) {
            if ($value['parent'] == $menu['id']) {
                $count++;
            }
        }

        $menuItemHTML = '';

        if ($count > 0) {
            $menuItemHTML .= "<li><a href='#'>" . ucfirst($menu['menu_name']) . "</a><ul class='dropdown'>";
            $menuItemHTML .= $this->generateMenuHTML($data, $menu['id']);
            $menuItemHTML .= '</ul></li>';
        } else {
            $action = strtolower(str_replace(" ", "", $menu['menu_url']));
            $menuItemHTML .= "<li><a href='./index.php?action=sanpham&act=$action'>".ucfirst($menu['menu_name']) . '</a></li>';
        }

        return $menuItemHTML;
    }
}
?>
