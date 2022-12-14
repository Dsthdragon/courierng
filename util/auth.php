<?php

/**
 * 
 */
class auth {

    public static function handleLogin() {
        @session_start();
        $logged = session::get('loggedIn');
        $role = session::get('role');
        if ($logged == false) {
            session::destroy();
            header('location:' . URL);
            exit();
        }
    }

    public static function handleLecturer() {
        @session_start();
        $logged = session::get('loggedIn');
        $role = session::get('role');
        if ($logged == false) {
            session::destroy();
            header('location:' . URL);
            exit();
        }
        if($role != "lecturer")
        {
            header('location:'.URL);
        }
    }

    public static function handleAdmin() {
        @session_start();
        $logged = session::get('loggedIn');
        $role = session::get('role');
        if ($logged == false) {
            session::destroy();
            header('location:' . URL);
            exit();
        }
        if($role != "admin")
        {
            header('location:'.URL);
        }
    }

    public static function hangin() {
        @session_start();
        $logged = session::get('loggedIn');
        $name = session::get('uid');
    }

}