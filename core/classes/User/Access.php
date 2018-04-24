<?php

class Access {

    public static function load_access_denied($header, $footer) {
        global $user, $page;

        try {
            include $header;

            echo '<div class="container lgMarginTop"><h3>You don\'t have permissions to perform this action</h3></div>';

            include $footer;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        } finally {
            die();
        }
    }

}