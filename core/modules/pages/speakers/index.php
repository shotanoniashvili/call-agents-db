<?php
$alert = new Alert();
$auth = new Auth();

if(!$auth->logged_in) {
    header("Location: index.php");
    exit;
}

$user = new User(Auth::get_uid());

if(!$user->is_admin()) {
    Access::load_access_denied(PROJECT_ROOT.'template/header.php', PROJECT_ROOT.'template/footer.php');
}

$view = PROJECT_ROOT.'template/pages/speakers/index.php';

if(isset($_POST['add-speaker'])) {
    include PROJECT_ROOT.'core/modules/pages/speakers/add.php';
}

if(isset($_GET['action'])) {
    if($_GET['action'] == 'add') {
        $view = PROJECT_ROOT.'template/pages/speakers/add.php';
    }

    if(isset($_GET['speaker-id'])) {
        $speaker = new Speaker((int)$_GET['speaker-id']);

        if($_GET['action'] == 'get') {
            //$view = PROJECT_ROOT.'template/pages/speakers/get.php';
        }
        if($_GET['action'] == 'edit') {
            if(isset($_POST['edit-speaker'])) {
                include PROJECT_ROOT.'core/modules/pages/speakers/edit.php';
            }
            $view = PROJECT_ROOT.'template/pages/speakers/edit.php';
        }
        if($_GET['action'] == 'delete') {
            include PROJECT_ROOT.'core/modules/pages/speakers/delete.php';
        }
    }
}

$speakers = Speaker::get_speakers();

include PROJECT_ROOT.'template/header.php';
include $view;
include PROJECT_ROOT.'template/footer.php';
