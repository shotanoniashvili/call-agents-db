<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Call Database</title>

    <link href="template/css/font-awesome.min.css" rel="stylesheet">

    <link href="template/css/style.css" rel="stylesheet">

</head>

<body class="navbar-fixed sidebar-nav fixed-nav">

    <div class = "container">
        <div class="wrapper">
            <form action="" method="post" name="Login_Form" class="form-signin">
                <h3 class="form-signin-heading">Authorization</h3>
                  <hr class="colorgraph"><br>
                  <?=$alert->get_html()?>
                  <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
                  <input type="password" class="form-control" name="password" placeholder="Password" required=""/>

                  <button class="btn btn-lg btn-primary btn-block"  name="log-in" value="Login" type="Submit">Login</button>
            </form>
        </div>
    </div>

    <footer class="footer resetLeft">
        <span class="text-left">
            <!--© <a href="http://bmcgorgia.ge/">BMC Gorgia</a>-->
        </span>
        <span class="float-xs-right">
            <!--Powered by <a href="mailto:shota.noniashvili@gmail.com">Shota Noniashvili</a>-->
        </span>
    </footer>

    <script type="text/javascript" src="template/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="template/js/utils.js"></script>
    <script type="text/javascript" src="template/js/tether.js"></script>
    <script type="text/javascript" src="template/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="template/js/pace.min.js"></script>
    <script type="text/javascript" src="template/js/snippets.js"></script>

    <script src="template/js/app.js"></script>
    <script src="template/js/views/main.js"></script>

</body>

</html>
