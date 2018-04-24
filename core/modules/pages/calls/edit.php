<?php

if(isset($_POST['edit-call'], $_GET['call-id'])) {
    $alerts = [];

    if(isset($_POST['call-date']) && !empty($_POST['call-date'])) {
        $date = DateTime::createFromFormat('d-m-Y H:i:s', $_POST['call-date']);
    } else {
        $alerts[] = 'Please fill date field';
    }

    if(isset($_POST['callback-date']) && !empty($_POST['callback-date'])) {
        $callback_date = DateTime::createFromFormat('d-m-Y H:i:s', $_POST['callback-date']);
    } else {
        $alerts[] = 'Please fill callback date field';
    }

    if(isset($_POST['agent-id']) && !empty($_POST['agent-id'])) {
        $agent = new User((int)$_POST['agent-id']);
    } else {
        $alerts[] = 'Please fill agent field';
    }

    if(isset($_POST['call-id']) && !empty($_POST['call-id'])) {
        $id = (int)$_POST['call-id'];
    } else {
        $alerts[] = 'Please fill agent field';
    }

    $speaker = new stdClass();
    $speaker->id = null;
    if(isset($_POST['speaker-id']) && !empty($_POST['speaker-id'])) {
        $speaker = new Speaker((int)$_POST['speaker-id']);
    }

    if(isset($_POST['country']) && !empty($_POST['country'])) {
        $country = $db->escape(htmlspecialchars($_POST['country']));
    } else {
        $alerts[] = 'Please fill country field';
    }

    $note = '';
    if(isset($_POST['note']) && !empty($_POST['note'])) {
        $note = htmlspecialchars($_POST['note']);
    }

    if(!empty($alerts)) {
        $alert->set_type('alert-warning');
        $alert->set_text($alerts);
    } else {
        $call->date = $date;
        $call->callback_date = $callback_date;
        $call->agent = $agent;
        $call->call_id = (int)$id;
        $call->spoke = $speaker;
        $call->country = $country;
        $call->note = $note;

        if($call->update()) {
            $alerts[] = 'Call successfully updated';
            $alert->set_type('alert-success');
            $alert->set_text($alerts);
        } else {
            $alerts[] = 'Unexpected error while updating a call';
            $alert->set_type('alert-success');
            $alert->set_text($alerts);
        }
    }
}