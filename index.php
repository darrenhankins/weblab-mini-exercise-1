<?php

  require_once('views/header.php'); // require will throw an error/expection and shut down

  if (isset($_GET['name'])){

    mail ("darren@adrnln.com",
    "You have a new comment!",
    $_GET['comment']);

    include_once('views/partials/hello.php'); // include will throw a warning
  } else {
    include_once('views/partials/input.php');
  }

 ?>
