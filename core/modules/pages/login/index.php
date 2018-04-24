<?php
  $auth = new Auth();
  $alert = new Alert();

  if(isset($_POST['log-in'])) {

      $alerts = array();

      if(isset($_POST['username'],$_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
          if($auth->check_login($_POST['username'], $_POST['password'])) {
              header("Location: index.php?page=main");
              exit;
          } else {
              $alerts[] = 'Incorrect username and/or password';
              $alert->set_type('alert-danger');
              $alert->set_text($alerts);
          }
      } else {
          $alerts[] = 'Please fill username and password field';
          $alert->set_type('alert-warning');
          $alert->set_text($alerts);
      }
  }

  include 'template/pages/login/index.php';
