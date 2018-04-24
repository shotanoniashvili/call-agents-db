<?php

if(isset($_POST['add-speaker'])) {
    $alerts = [];

    if(isset($_POST['first-name']) && !empty($_POST['first-name'])) {
        $firstname = $db->escape(htmlspecialchars($_POST['first-name']));
    } else {
        $alerts[] = 'Please fill firstname field';
    }
    if(isset($_POST['last-name']) && !empty($_POST['last-name'])) {
        $lastname = $db->escape(htmlspecialchars($_POST['last-name']));
    } else {
        $alerts[] = 'Please fill lastname field';
    }

    if(!empty($alerts)) {
        $alert->set_type('alert-warning');
        $alert->set_text($alerts);
    } else {
        if(Speaker::add($firstname, $lastname)) {
            $alerts[] = 'Speaker successfully added';
            $alert->set_type('alert-success');
            $alert->set_text($alerts);
        } else {
            $alerts[] = 'Unexpected error while adding an spoke';
            $alert->set_type('alert-success');
            $alert->set_text($alerts);
        }
    }
}