<?php

if(isset($_POST['edit-speaker'], $_GET['speaker-id'])) {
    $speaker = new Speaker((int)$_GET['speaker-id']);

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
        $speaker->firstname = $firstname;
        $speaker->lastname = $lastname;

        if($speaker->update()) {
            $alerts[] = 'Speaker successfully updated';
            $alert->set_type('alert-success');
            $alert->set_text($alerts);
        } else {
            $alerts[] = 'Unexpected error while updating an spoke';
            $alert->set_type('alert-success');
            $alert->set_text($alerts);
        }
    }
}