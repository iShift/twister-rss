<?php
$rpcusername = $_POST['rpcusername'];
$rpcpassword1 = $_POST['rpcpassword1'];
session_start();
require('settings.php');
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
          <li class="active"><a href="#">Admin</a></li>
          <li><a href="about.php">About</a></li>
        </ul>
        <h3 class="text-muted">Twister-RSS</h3>
      </div>';


if ($_SESSION['login'] ==='true') { 
header('Location: http://'.$domain.'/cms/admin.php');
}else {
//header('Location: http://'.$domain.'/cms/index.php');	
//die ();
}						
if (empty($rpcusername)){
echo '<hr><div align="center" class="jumbotron">
        <h1>Login</h1>
       <form class="navbar-form" action="index.php" method="post"><div class="form-group">';
echo 'RPC username: <input class="form-control" name="rpcusername" type="text" size="20"><br> 
	  RPC password: <input class="form-control" name="rpcpassword1" type="password" size="20"><br><br>';
	  echo '<input style="margin-left:20px" class="btn btn-primary" type="submit" value="Войти"></div></div></form>
      
';
}else{
if ($rpcusername == $rpcuser && $rpcpassword1 == $rpcpassword) { 
	$_SESSION['login']='true';
header('Location: http://'.$domain.'/cms/admin.php');
}else {
//echo $rpcpassword .' / '.$rpcpassword1 . ' / '.$rpcuser.' / '.$rpcusername;
	die ('Bad username/password');
}

}    
							
    echo '  <div class="footer">
        <p>&copy; Company 2014</p>
      </div>

    </div> <!-- /container -->



  </body>
</html>';


