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

$view = PROJECT_ROOT.'template/pages/agents/index.php';

if(isset($_GET['action'])) {
    if($_GET['action'] == 'add') {
        if(isset($_POST['add-agent'])) {
            include PROJECT_ROOT.'core/modules/pages/agents/add.php';
        }
        $view = PROJECT_ROOT.'template/pages/agents/add.php';
    }

    if(isset($_GET['agent-id'])) {
        $agent = new User((int)$_GET['agent-id']);

        if($_GET['action'] == 'get') {
            //$view = PROJECT_ROOT.'template/pages/agents/get.php';
        }
        if($_GET['action'] == 'edit') {
            if(isset($_POST['edit-agent'])) {
                include PROJECT_ROOT.'core/modules/pages/agents/edit.php';
            }
            $view = PROJECT_ROOT.'template/pages/agents/edit.php';
        }
        if($_GET['action'] == 'delete') {
            include PROJECT_ROOT.'core/modules/pages/agents/delete.php';
        }
    }
}

$agents = User::get_agents();

include PROJECT_ROOT.'template/header.php';
include $view;
include PROJECT_ROOT.'template/footer.php';
