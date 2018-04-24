<?php

class Alert {

    function __construct() {
        $this->alerts = array();
        $this->type = '';
        $this->text ='';
        $this->hide = 'hide';
        $this->html = '<div class="message-container '.$this->hide.'"><div class="text-md-center alert '.$this->type.'">'. $this->text .'</div></div>';
    }

    function set_type($type) {
        $this->type = $type;
    }

    function set_text($alerts) {
        $this->remove_hide();
        $this->alerts = $alerts;
    }

    function set_html() {
        foreach ($this->alerts as $alert) {
            $this->text .= '<p>'.$alert.'</p>';
        }
        $this->html = '<div class="message-container '.$this->hide.'"><div class="text-md-center alert '.$this->type.'">'. $this->text .'</div></div>';
    }

    function remove_hide() {
        $this->hide = '';
    }

    function get_html() {
        $this->set_html();
        return $this->html;
    }

}

?>
