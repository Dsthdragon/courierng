<?php

class imagedisplay {

    public static function display($link) {
        if (!empty($link) && file_exists(ROOT . '/' . $link)) {
            return "<img src='" . URL . $link."' style='width:100%' />";
        }else{
            return null;
        }
    }
    

}
