<?php

class delete {
    public function deleteCartItem($itemKey)
    {
        if (isset($_SESSION['cart'][$itemKey])) {
            unset($_SESSION['cart'][$itemKey]);
        }
    }
}
?>