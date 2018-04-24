<?php

Auth::logout();
header("Location: index.php?page=login");
exit;