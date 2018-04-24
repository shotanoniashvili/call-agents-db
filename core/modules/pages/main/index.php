<?php
    $alert = new Alert();
    $auth = new Auth();

    if(!$auth->logged_in) {
        header("Location: index.php");
        exit;
    }

    $user = new User(Auth::get_uid());

    $agents = User::get_agents();
    $speakers = Speaker::get_speakers();

    if($user->is_admin() && isset($_POST['add-agent'])) {
        include PROJECT_ROOT.'core/modules/pages/agents/add.php';
    }
    if($user->is_admin() && isset($_POST['add-speaker'])) {
        include PROJECT_ROOT.'core/modules/pages/speakers/add.php';
    }
    if(isset($_POST['add-call'])) {
        include PROJECT_ROOT.'core/modules/pages/calls/add.php';
    }

    include PROJECT_ROOT.'template/header.php';
    include PROJECT_ROOT.'template/pages/main/index.php';
    include PROJECT_ROOT.'template/footer.php';
