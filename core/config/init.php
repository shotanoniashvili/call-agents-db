<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

session_start();
ob_start();

include PROJECT_ROOT.'core/config/vars.php';
include PROJECT_ROOT.'core/config/db-config.php';

include PROJECT_ROOT.'core/classes/User/Auth.php';
include PROJECT_ROOT.'core/classes/User/UserRole.php';
include PROJECT_ROOT.'core/classes/User/User.php';
include PROJECT_ROOT.'core/classes/Alert/Alert.php';
include PROJECT_ROOT.'core/classes/Speaker/Speaker.php';
include PROJECT_ROOT.'core/classes/Call/Call.php';
include PROJECT_ROOT.'core/classes/User/Access.php';
