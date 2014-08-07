<?php
session_start();
require('settings.php');
if ($_SESSION['login'] ==='true') { 
//header('Location: http://'.$domain.'/cms/admin.php');
}else {
header('Location: http://'.$domain.'/cms/index.php');	
die ();
}
echo '<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Twister-RSS</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li ><a href="admin.php">Admin</a></li>
          <li class="active"><a class="active"href="#">About</a></li>
         
        </ul>
        <h3 class="text-muted">Twister-RSS</h3>
      </div>';


echo '<hr><div class="">
        <h1>About</h1>
       <h2>Twister-RSS v 0.1</h2>
       <h3>Авторы данного софта: @denis, @shift</h3>
      
';



    
    echo '  <div class="footer">
        <p>&copy; Company 2014</p>
      </div>

    </div> <!-- /container -->



  </body>
</html>';


