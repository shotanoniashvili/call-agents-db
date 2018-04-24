<?php
$alert = new Alert();
$auth = new Auth();

if(!$auth->logged_in) {
    header("Location: index.php");
    exit;
}

$user = new User(Auth::get_uid());

$view = PROJECT_ROOT.'template/pages/calls/index.php';


$date_from = new DateTime();
$date_to = new DateTime();

$filter = [];
if(isset($_GET['action'])) {
    $agents = User::get_agents();
    $speakers = Speaker::get_speakers();

    if($_GET['action'] == 'add') {
        if(isset($_POST['add-call'])) {
            include PROJECT_ROOT.'core/modules/pages/calls/add.php';
        }
        $view = PROJECT_ROOT.'template/pages/calls/add.php';
    }

    if(isset($_GET['call-id'])) {
        if(!$user->is_admin()) {
            Access::load_access_denied(PROJECT_ROOT.'template/header.php', PROJECT_ROOT.'template/footer.php');
        }

        $call = new Call((int)$_GET['call-id']);

        if($_GET['action'] == 'get') {
            //$view = PROJECT_ROOT.'template/pages/calls/get.php';
        }
        if($_GET['action'] == 'edit') {
            if(isset($_POST['edit-call'])) {
                include PROJECT_ROOT.'core/modules/pages/calls/edit.php';
            }
            $view = PROJECT_ROOT.'template/pages/calls/edit.php';
        }
        if($_GET['action'] == 'delete') {
            include PROJECT_ROOT.'core/modules/pages/calls/delete.php';
        }
    }
    if($_GET['action'] == 'filter') {
        if(isset($_GET['filter-date-from']) && !empty($_GET['filter-date-from'])) {
            $date_from = DateTime::createFromFormat('d-m-Y', $_GET['filter-date-from']);
        }
        if(isset($_GET['filter-date-to']) && !empty($_GET['filter-date-to'])) {
            $date_to = DateTime::createFromFormat('d-m-Y', $_GET['filter-date-to']);
        }

        if($user->is_admin()) {
            if(isset($_GET['filter-agent']) && !empty($_GET['filter-agent'])) {
                $filter['agent'] = (int)$_GET['filter-agent'];
            }
            if(isset($_GET['filter-speaker']) && !empty($_GET['filter-speaker'])) {
                $filter['spoke'] = (int)$_GET['filter-speaker'];
            }
            if(isset($_GET['filter-call-id']) && !empty($_GET['filter-call-id'])) {
                $filter['id'] = (int)$_GET['filter-call-id'];
            }
            if(isset($_GET['filter-country']) && !empty($_GET['filter-country'])) {
                $filter['country'] = (int)$_GET['filter-country'];
            }
        }
    }
}
$args = $filter;
$filter['date-from'] = $date_from->format('d-m-Y');
$filter['date-to'] = $date_to->format('d-m-Y');

if($user->is_admin()) {
    $calls = Call::get_calls([$date_from->format('Y-m-d 00:00:00'), $date_to->modify('+1 day')->format('Y-m-d 00:00:00')], $args);
} elseif($user->is_agent()) {
    $calls = Call::get_calls([$date_from->format('Y-m-d 00:00:00'), $date_to->modify('+1 day')->format('Y-m-d 00:00:00')], ['agent' => $user->id]);
}

include PROJECT_ROOT.'template/header.php';
include $view;
include PROJECT_ROOT.'template/footer.php';
