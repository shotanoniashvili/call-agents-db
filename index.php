<?php
define('PROJECT_ROOT', '/var/www/html/');

include PROJECT_ROOT.'core/config/init.php';

$auth = new Auth();

if(!$auth->logged_in && (!isset($_GET['page']) || $_GET['page'] != 'login')) {
    header("Location: index.php?page=login");
    exit;
}

if(isset($_GET['page']) && !empty($_GET['page'])) {
    $page = $_GET['page'];
    if(file_exists(PROJECT_ROOT.'core/modules/pages/'.$page.'/index.php')) {
        require_once PROJECT_ROOT.'core/modules/pages/'.$page.'/index.php';
    } else {
        require_once PROJECT_ROOT.'core/modules/pages/main/index.php';
    }
} else {
    require_once PROJECT_ROOT.'core/modules/pages/main/index.php';
}