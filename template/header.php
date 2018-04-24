<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<link rel="shortcut icon" href="img/favicon.png">-->

    <title>Call Database</title>

    <script type="text/javascript" src="template/js/jquery-3.1.1.min.js"></script>

    <link href="template/css/font-awesome.min.css" rel="stylesheet">

    <link href="template/css/bootstrap.min.css" rel="stylesheet">
    <link href="template/css/jquery-ui.min.css" rel="stylesheet">
    <link href="template/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="template/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="template/vendors/chosen_v1.8.2/chosen.min.css" rel="stylesheet">
    <link href="template/vendors/chosen_v1.8.2/chosen-bootstrap.css" rel="stylesheet">
    <link href="template/vendors/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="template/css/style.css" rel="stylesheet">

    <script type="text/javascript">
        $(document).ready(function(){
            $('.dropdown-submenu a.dropdown-link').on("click", function(e){
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });
    </script>
</head>

<body>

    <header class="navbar">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav" style="width: 100%">
                    <li <?=(!isset($page) || $page == 'main' ? 'class="active"' : '')?>><a href="index.php?page=main"><i class="fa fa-home" aria-hidden="true"></i></a></li>

                    <?php
                        if($user->is_admin()) {
                    ?>
                            <li <?=(isset($page) && $page == 'calls' ? 'class="active"' : '')?>><a href="index.php?page=calls">Calls</a></li>
                            <li <?=(isset($page) && $page == 'agents' ? 'class="active"' : '')?>><a href="index.php?page=agents">Agents</a></li>
                            <li <?=(isset($page) && $page == 'speakers' ? 'class="active"' : '')?>><a href="index.php?page=speakers">Speakers</a></li>
                    <?php
                        } elseif($user->is_agent()) {
                    ?>
                            <li <?=(isset($page) && $page == 'calls' ? 'class="active"' : '')?>><a href="index.php?page=calls">My Calls</a></li>
                    <?php
                        }
                    ?>
                    <li class="pull-right"><a href="index.php?page=logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
