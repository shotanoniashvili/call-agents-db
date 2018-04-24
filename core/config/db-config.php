<?php

include PROJECT_ROOT.'core/classes/DB/MysqliDb.php';

$db = new MysqliDb (Array (
                'host' => DB_HOST,
                'username' => DB_USER,
                'password' => DB_PASS,
                'db'=> DB_NAME,
                'port' => 3306,
                'charset' => 'utf8'));
