<?php

class urlencoder {

    public static function code($seperator, $link) {
        $newlink = str_replace(' ', $seperator, $link);
        return $newlink;
    }

    public static function decode($seperator, $link) {
        $newlink = str_replace($seperator, ' ', $link);
        return $newlink;
    }

}
